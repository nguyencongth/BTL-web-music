<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../common/Bootstrap/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../CSS/sontung.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../CSS//base.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../../fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <link rel="icon" type="image/x-icon" href="../../img/logo.png">
    <title>Hòa Minzy - nhạc Hòa Minzy</title>
</head>

<body>
    <?php
    session_start();
    $a = 0;
    $ID = $_SESSION["ID"];
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
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
                    <img src="../../img/img_logo.jpg" alt="logo music">
                </div>
                <div class="header_nav">
                    <ul>
                        <li><a class="active" href="../../../index.php">Home</a></li>
                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-create_playlist">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (isset($_SESSION["USER"])) {
                        ?>
                            <li><a href="../playlist.php">Playlist</a></li>
                        <?php } ?>

                        <?php
                        if (empty($_SESSION["USER"])) {
                        ?>
                            <li><a href="#" class="js-premium">Premium</a></li>
                        <?php } ?>

                        <?php if (isset($_SESSION["USER"])) { ?>
                            <?php if ($a == 1) { ?>
                                <li><a href="../premium3.php">Premium</a></li>
                            <?php } else { ?>
                                <li><a href="../premium.php">Premium</a></li>
                            <?php } ?>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="search">
                <input type="text" name="" id="" class="form_search" placeholder="Search here....." size="50">
                <div><i class="search_icon ti-search"></i></div>
            </div>
            <div class="header_signin_signup">
                <?php
                if (empty($_SESSION["USER"]) && empty($_SESSION["PASSWORD"])) {
                ?>
                    <ul style="display: flex;">
                        <li><a href="../signin.php">Sign in</a></li>
                        <li><a href="../signup.php">Sign up</a></li>
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
                                    <li><a class="dropdown-item" style="color: #000; font-size: 16px;" href="../logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div id="banner">
            <div class="banner-content">
                <div class="banner-title">
                    <p>Hòa Minzy</p>
                </div>
                <div class="banner-desc">
                    <p>Có chất giọng cao luyến láy cùng những bản hit RnB hay Dance Pop, Sơn Tùng M-TP là ca sĩ rất thành công, không chỉ nổi tiếng ở Việt Nam mà còn được khán giả yêu nhạc Việt trên thế giới biết đến.</p>
                    <p>Năm 2015, anh rời khỏi công ty cũ và gia nhập WePro, tổ chức minishow đầu tiên "M-TP and Friends".</p>
                    <p>Năm 2017, anh rời khỏi WePro để thành lập M-TP Entertainment, ra mắt "Lạc Trôi" và "Nơi Này Có Anh". Anh ra mắt album đầu tay "m-tp M-TP".</p>
                    <p>Năm 2018 anh ra mắt "Chạy Ngay Đi" và "Hãy Trao Cho Anh" năm 2019. Cả hai bài hát đều trở thành hit. Đặc biệt "Hãy Trao Cho Anh" kết hợp với Snopp Dogg đã đưa tên tuổi anh ra thế giới.</p>
                </div>
            </div>
            <div class="banner-img">
                <img src="../../img/hoaminzy.jpg" alt="">
            </div>
        </div>

        <div class="musicList">
            <div class="play">
                <span><i class="fa-sharp fa-solid fa-circle-play"></i></span>
                <button>Follow</button>
            </div>
            <div class="musicList-box">
                <div class="musicList-title">
                    <p>Popular</p>
                </div>
                <div class="playlist">

                </div>
            </div>
        </div>


        <div id="play_music">
            <div class="rangeBar">

                <input type="range" class="seekbar" value="0" step="1" min="0" max="100">

            </div>
            <audio id="songFile" src=""></audio>
            <div class="playerBar_item">
                <div class="playerBar_item-info">
                    <div class="playerBar_item-img">
                        <img class="playerBar_item-img--thumb" alt="">
                    </div>
                    <div class="playerBar_item-name">
                        <div class="playerBar_item-name--nameSong">Bông Hoa Đẹp Nhất</div>
                        <div class="playerBar_item-name--nameArtist">Quân AP</div>
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
    $conn = mysqli_connect('localhost', 'root', '', 'nhom8_web-music');
    $result = mysqli_query($conn, "SELECT * from music1, singer where singer.ID_Singer = music1.ID_Singer and Name_Singer like 'hòa Minzy' ");
    $a=0;
     ?>
    <script>
        
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
            songs: [
                <?php while($row = mysqli_fetch_assoc($result)){ $a++; echo "{" ?>
                    nameSong: '<?php echo $row["Name_Music"] ?>',
                    singer: '<?php echo $row["Name_Singer"] ?>',
                    path: '<?php echo "../../Music/HoaMinzy/" . $row["SRC_Music"] ?>',
                    img: '<?php echo "../../img/" . $row["IMG"] ?>'
                <?php if($a == mysqli_num_rows($result)){ echo "}";} else { echo "},";} } ?>
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

                // xử lý ảnh quay
                const thumbAnimate = thumb.animate([{
                    transform: 'rotate(360deg)'
                }], {
                    duration: 10000, // 10 seconds
                    iterations: Infinity // quay vô hạn
                })
                thumbAnimate.pause()

                // xử lý khi click play
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

                // khi song bị pause
                audio.onpause = function() {
                    _this.isPlaying = false
                    playBtn.innerHTML = `<i class="fa-solid fa-circle-play"></i>`
                    thumbAnimate.pause()
                };

                // Khi tiến độ bài hát thay đổi
                audio.ontimeupdate = function() {
                    if (audio.duration) {
                        const seek = Math.floor(audio.currentTime / audio.duration * 100)
                        seekbar.value = seek
                    }

                };

                // xử lý khi tua song
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
                // xử lý bật / tắt random
                random_btn.onclick = function(e) {
                    _this.isRandom = !_this.isRandom;
                    // _this.setConfig('isRandom', _this.isRandom)
                    random_btn.classList.toggle("active", _this.isRandom);
                };

                // xử lý repeat lại 1 song
                repeat_btn.onclick = function(e) {
                    _this.isRepeat = !_this.isRepeat;
                    // _this.setConfig('isRepeat', _this.isRepeat)
                    repeat_btn.classList.toggle("active", _this.isRepeat);
                };

                // xử lý next song khi end
                audio.onended = function() {
                    if (_this.isRepeat) {
                        audio.play()
                    } else {
                        next_btn.click()
                    }
                };

                // xử lý hành vi click vào playlist
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
                // định nghĩa các thuộc tính cho object
                this.defineProperties()

                // Tải thông tin bài hát đầu tiên vào UI khi chạy ứng dụng
                this.loadCurrentSong()

                // Lắng nghe / xử lý các sự kiện (DOM events)
                this.handleEvents()
                // lắng nghe tăng giảm volume
                this.volume()

                // Render playlist
                this.render()

            }
        }
        app.start();
    </script>
    <script src="../../common/Jquery/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>