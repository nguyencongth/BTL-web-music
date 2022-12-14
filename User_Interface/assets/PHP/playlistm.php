<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/sontung.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <title>Playlist</title>
    <style>
        table {
            width: 400px;
        }

        .btnAdd {
            width: 70px;
            height: 36px;
            border-radius: 8px;
        }

        .btnAdd:hover {
            background-color: #ccc;
        }

        .btnAdd a {
            color: #000;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $a = 0;
    $ID = $_SESSION["ID"];
    $result = mysqli_query($conn, "SELECT * from pay");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($ID == $row["ID_THONGTIN"]) {
            $a++;
        }
    }
    ?>
    <div id="main">
        <div id="header">
            <div class="header_wapper">
                <div class="header_logo">
                    <img src="../img/img_logo.jpg" alt="logo music">
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a href="../../index.php">Home</a></li>
                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-create_playlist">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (isset($_SESSION["USER"])) {
                        ?>
                            <li><a class="active" href="../PHP/playlist.php">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-premium">Premium</a></li>
                        <?php } ?>

                        <?php if (isset($_SESSION["USER"])) { ?>
                            <?php if ($a == 1) { ?>
                                <li><a href="../PHP/premium3.php">Premium</a></li>
                            <?php } else { ?>
                                <li><a href="../PHP/premium.php">Premium</a></li>
                            <?php } ?>
                        <?php } ?>

                    </ul>
                </div>
            </div>

           <!-- d??ng ????? x??a b??i h??t trong playlist -->
            <?php
            if (isset($_GET["pla"])) {
                $pla = $_GET["pla"];
                mysqli_query($conn, "DELETE FROM music_playlist where ID_MUSICPLAYLIST = '$pla' ");
            }
            ?>



            <form method="post">
                <div class="search">
                    <input type="text" name="search" id="" class="form_search" placeholder="Search here....." size="50">
                    <div><button type="submit" name="btn_tk" style="border: none;"><i class="search_icon ti-search" style="margin-top: -20px;"></i></button></div>
                </div>
            </form>
            <div class="header_signin_signup">
                <?php
                if (empty($_SESSION["USER"]) && empty($_SESSION["PASSWORD"])) {
                ?>
                    <ul style="display: flex;">
                        <li><a href="./assets/PHP/signin.php">Sign in</a></li>
                        <li><a href="./assets/PHP/signup.php">Sign up</a></li>
                    </ul>
                <?php } ?>
                <?php
                if (isset($_SESSION["USER"]) && isset($_SESSION["PASSWORD"])) {
                ?>
                    <div>
                        <ul id="n">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" style="color:#fff; border: 1px solid white; border-radius: 8px; margin-right: 50px; background: green;">
                                    <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION["USER"]; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="#">Account</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="#">Change password</a></li>
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="./assets/PHP/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

         <!-- d??ng ????? t??m ki???m b??i nh???c add v??o playlist -->
        <?php
        $TK = "";
        $w = 0;
        $error = array();
        if (isset($_GET["MA"])) {
            $_SESSION["MA"] = $_GET["MA"];
        }
        if (isset($_POST["search"])) {
            $TK = $_POST["search"];
        }
        ?>

        <div id="banner">
            <div class="banner-content">
                <table>
                    <?php if (isset($_POST["btn_tk"])) {
                        $qr = mysqli_query($conn, "SELECT * from music1, singer where singer.ID_Singer = music1.ID_Singer and (Name_Music LIKE '%$TK%' or Name_Singer LIKE '%$TK%')");
                        $qr1 = mysqli_query($conn, "SELECT * from music1, singer where singer.ID_Singer = music1.ID_Singer");
                        if (mysqli_num_rows($qr) > 0) {
                            if (mysqli_num_rows($qr) < mysqli_num_rows($qr1)) {
                                while ($row = mysqli_fetch_assoc($qr)) {
                    ?>
                                    <tr>
                                        <td><?php echo $row["Name_Music"]; ?></td>
                                        <td><?php echo $row["Name_Singer"]; ?></td>
                                        <td><button class="btnAdd" type="submit" name="sub"><a href="./playlistm.php?MA=<?php echo  $_SESSION["MA"]; ?>&ID=<?php echo $row["ID_Music"]; ?>">Add</a></button></td>
                                    </tr>
                    <?php      }
                            } else {
                                echo "vui l??ng nh???p th??ng tin t??m ki???m";
                            }
                        }
                        if (mysqli_num_rows($qr) == 0) {
                            echo "kh??ng c?? k???t qu??? t??m ki???m";
                        }
                    }
                    if (isset($error["eBAIHAT"])) {
                        echo $error["eBAIHAT"];
                    }
                    ?>
                </table>
            </div>

           <!-- khi b???m v??o th??m th?? s??? add th??ng tin v??o danh s??ch playlist -->
            <?php
            if (isset($_GET["MA"])) {
                $MA = $_GET["MA"];
            }
            if (isset($_GET["ID"])) {
                $re = mysqli_query($conn, "SELECT * FROM music_playlist where ID_PLAYLIST = '$MA'");
                $qer = mysqli_query($conn, "SELECT * FROM music1, singer where singer.ID_Singer = music1.ID_Singer");
                $ID = $_GET["ID"];
                $Name_Music = "";
                $Name_Singer = "";
                $SRC_Music = "";
                $IMG = "";
                while ($row = mysqli_fetch_assoc($qer)) {
                    if ($ID == $row["ID_Music"]) {
                        $Name_Music = $row["Name_Music"];
                        $Name_Singer = $row["Name_Singer"];
                        $SRC_Music = $row["SRC_Music"];
                        $IMG = $row["IMG"];
                    }
                }
                while ($row = mysqli_fetch_assoc($re)) {
                    if ($Name_Music == $row["Name_Music"]) {
                        $w++;
                    }
                }
                if (!empty($Name_Music) && !empty($Name_Singer)  && $w == 0) {
                    mysqli_query($conn, "INSERT INTO music_playlist value('','$Name_Music','$Name_Singer','$IMG','$SRC_Music','$MA')");
                }
                if (!empty($Name_Music) && !empty($Name_Singer)  && $w == 1) {
                   echo "b??i h??t n??y ???? c?? trong playlist c???a b???n";
                }
            }
            ?>

           
        </div>

        <div class="musicList">
            <div class="play">
                <span><i class="fa-sharp fa-solid fa-circle-play"></i></span>
                <button>Follow</button>
            </div>
            <div class="musicList-box">
                <div class="musicList-title">
                    <p>Danh S??ch Nh???c</p>
                </div>
                <div class="playlist">

                </div>
            </div>
        </div>


        <div id="play_music">
            <div class="rangeBar">
                <!-- <div class="currTime">00:00</div> -->
                <input type="range" class="seekbar" value="0" step="1" min="0" max="100">
                <!-- <div class="durrTime">00:00</div> -->
            </div>
            <audio id="songFile" src=""></audio>
            <div class="playerBar_item">
                <div class="playerBar_item-info">
                    <div class="playerBar_item-img">
                        <img class="playerBar_item-img--thumb" alt="">
                    </div>
                    <div class="playerBar_item-name">
                        <div class="playerBar_item-name--nameSong">None</div>
                        <div class="playerBar_item-name--nameArtist">None</div>
                    </div>
                </div>
                <div>
                    <div class="playerBar_item-action">
                        <div class="random">
                            <i class="fa-light fa-shuffle"></i>
                        </div>
                        <div class="btn-back back playerBar_item-action--size">
                            <i class="fa-solid fa-backward-fast"></i>
                        </div>
                        <div id="pause" class="pause1 playerBar_item-action--pausesize">
                            <i class="fa-solid fa-circle-play"></i>
                        </div>
                        <div class="btn-next next playerBar_item-action--size">
                            <i class="fa-solid fa-forward-fast"></i>
                        </div>
                        <div class="replay btn-repeat">
                            <i class="fa-light fa-arrows-repeat"></i>
                        </div>
                    </div>
                </div>
                <div class="playerBar_item-vol">
                    <div class="playerBar_item-vol--icon"><i class="fa-solid fa-volume-high"></i></div>
                    <div class="playerBar_item-vol--bar"><input type="range" name="" id="volRange"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $MA = $_SESSION["MA"];
    $result = mysqli_query($conn, "SELECT * from music_playlist where ID_PLAYLIST = '$MA' ");
    $er = array();
    $a = 0;
    ?>

    <script type="text/javascript">
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)
        const nameSong = $('.playerBar_item-name--nameSong')
        const nameSinger = $('.playerBar_item-name--nameArtist')
        const thumb = $('.playerBar_item-img--thumb')
        const audio = $('#songFile')
        const playBtn = $('#pause')
        const seekbar = $('.seekbar')
        const back_btn = $('.btn-back')
        const next_btn = $('.btn-next')
        const random_btn = $('.random')
        const repeat_btn = $('.btn-repeat')
        const playlist = $('.playlist')
        const volume = $('#volRange')
        const app = {
            currentIndex: 0,
            isPlaying: false,
            isRandom: false,
            isRepeat: false,
            songs: [<?php while ($row = mysqli_fetch_assoc($result)) {
                        $a++;
                        echo "{"; ?>
                    nameSong: '<?php echo  $row["Name_Music"]; ?>',
                    singer: '<?php echo $row["Name_Singer"]; ?>',
                    path: '<?php echo "../Music/" . $row["SRC_Music"]; ?>',
                    img: '<?php echo "../img/" . $row["IMG"]; ?>',
                    pla: '<?php echo $row["ID_MUSICPLAYLIST"]; ?>'
                <?php
                        if ($a == mysqli_num_rows($result)) {
                            echo "}";
                        } else {
                            echo "},";
                        }
                    } ?>
            ],
            render: function() {
                const htmls = this.songs.map((song, index) => {
                    return `
                <div class="musicList-popular ${index === this.currentIndex ? 'active' : ''}" data-index = "${index}">
                    <div class="musicList-popular-img">
                        <img src="${song.img}" alt="" width="100%">
                    </div>
                    <div class="musicList-popular-nameSong">
                        <p>${song.nameSong}</p>
                        <div class="singer">
                            <p>${song.singer}</p>
                        </div>
                    </div>
                    <div style="margin-left: auto;">
                    <a href="playlistm.php?pla=${song.pla}"><button class="btnAdd">x??a</button></a>
                    </div>
                </div>
            `
                })
                playlist.innerHTML = htmls.join('')
            },
            volume: function() {
                volume.addEventListener("change", function(e) {
                    audio.volume = e.currentTarget.value / 100;
                })
            },
            defineProperties: function() {
                Object.defineProperty(this, 'currentSong', {
                    get: function() {
                        return this.songs[this.currentIndex]
                    }
                })
            },
            handleEvents: function() {
                const _this = this

                // x??? l?? ???nh quay
                const thumbAnimate = thumb.animate([{
                    transform: 'rotate(360deg)'
                }], {
                    duration: 10000, // 10 seconds
                    iterations: Infinity // quay v?? h???n
                })
                thumbAnimate.pause()

                // x??? l?? khi click play
                playBtn.onclick = function() {
                    if (_this.isPlaying) {
                        audio.pause()
                    } else {
                        audio.play()
                    }

                };
                // khi song dc play
                audio.onplay = function() {
                    _this.isPlaying = true
                    playBtn.innerHTML = `<i class="fa-sharp fa-solid fa-circle-pause"></i>`
                    thumbAnimate.play()
                };

                // khi song b??? pause
                audio.onpause = function() {
                    _this.isPlaying = false
                    playBtn.innerHTML = `<i class="fa-solid fa-circle-play"></i>`
                    thumbAnimate.pause()
                };

                // Khi ti???n ????? b??i h??t thay ?????i
                audio.ontimeupdate = function() {
                    if (audio.duration) {
                        const seek = Math.floor(audio.currentTime / audio.duration * 100)
                        seekbar.value = seek
                    }

                };

                // x??? l?? khi tua song
                seekbar.onchange = function(e) {
                    const seekTime = audio.duration / 100 * e.target.value
                    audio.currentTime = seekTime
                };

                // khi next song
                next_btn.onclick = function() {
                    if (_this.isRandom) {
                        _this.playRandomSong();
                    } else {
                        _this.nextSong();
                    }
                    audio.play();
                    _this.render();
                    _this.ScrollToActiveSong()
                };

                // khi back song
                back_btn.onclick = function() {
                    if (_this.isRandom) {
                        _this.playRandomSong();
                    } else {
                        _this.backSong();
                    }
                    audio.play();
                    _this.render();
                    _this.ScrollToActiveSong()
                };
                // x??? l?? b???t / t???t random
                random_btn.onclick = function(e) {
                    _this.isRandom = !_this.isRandom;
                    // _this.setConfig('isRandom', _this.isRandom)
                    random_btn.classList.toggle("active", _this.isRandom);
                };

                // x??? l?? repeat l???i 1 song
                repeat_btn.onclick = function(e) {
                    _this.isRepeat = !_this.isRepeat;
                    // _this.setConfig('isRepeat', _this.isRepeat)
                    repeat_btn.classList.toggle("active", _this.isRepeat);
                };

                // x??? l?? next song khi end
                audio.onended = function() {
                    if (_this.isRepeat) {
                        audio.play()
                    } else {
                        next_btn.click()
                    }
                };

                // x??? l?? h??nh vi click v??o playlist
                playlist.onclick = function(e) {
                    const SongNode = e.target.closest('.musicList-popular:not(.active)')
                    if (SongNode) {
                        _this.currentIndex = Number(SongNode.dataset.index)
                        _this.loadCurrentSong()
                        _this.render()
                        audio.play()
                    }
                };

            },
            ScrollToActiveSong: function() {
                setTimeout(() => {
                    $('.musicList-popular.active').scrollIntoView()
                }, 500)
            },
            loadCurrentSong: function() {
                nameSong.textContent = this.currentSong.nameSong
                nameSinger.textContent = this.currentSong.singer
                thumb.src = this.currentSong.img
                audio.src = this.currentSong.path
            },


            nextSong: function() {
                this.currentIndex++
                if (this.currentIndex >= this.songs.length) {
                    this.currentIndex = 0
                }
                this.loadCurrentSong()
            },

            backSong: function() {
                this.currentIndex--
                if (this.currentIndex < 0) {
                    this.currentIndex = this.songs.length - 1
                }
                this.loadCurrentSong()
            },

            playRandomSong: function() {
                let newIndex;
                do {
                    newIndex = Math.floor(Math.random() * this.songs.length);
                } while (newIndex === this.currentIndex);

                this.currentIndex = newIndex;
                this.loadCurrentSong();
            },

            start: function() {
                // ?????nh ngh??a c??c thu???c t??nh cho object
                this.defineProperties()

                // T???i th??ng tin b??i h??t ?????u ti??n v??o UI khi ch???y ???ng d???ng
                this.loadCurrentSong()

                // L???ng nghe / x??? l?? c??c s??? ki???n (DOM events)
                this.handleEvents()
                // l???ng nghe t??ng gi???m volume
                this.volume()

                // Render playlist
                this.render()

            }
        }
        app.start();
    </script>


    <script src="../common/Jquery/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>