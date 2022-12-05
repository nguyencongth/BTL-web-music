

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
        {
            nameSong: 'Chạy ngay đi',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/chayngaydi.mp3',
            img: '../img/music-chayngaydi.jpg'
        },
        {
            nameSong: 'Chúng ta của hiện tại',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/chungtacuahientai.mp3',
            img: '../img/music-chungtacuahientai.jpg'
        },
        {
            nameSong: 'Muộn rồi mà sao còn',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/MuonRoiMaSaoCon.mp3',
            img: '../img/music-muonroimasaocon.jpg'
        },
        {
            nameSong: 'Cơn mưa ngang qua',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/ConMuaNgangQua.mp3',
            img: '../img/music-commuaxadan.jpg'
        },
        {
            nameSong: 'Hãy trao cho anh',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/haytraochoanh.mp3',
            img: '../img/music-haytraochoanh.jpg'
        },
        {
            nameSong: 'Nắng ấm xa dần',
            singer: 'Sơn Tùng M-TP',
            path: '../Music/SonTung/nangamxadan.mp3',
            img: '../img/music-commuaxadan.jpg'
        }
    ],
    render: function(){
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
    volume: function(){
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
        const thumbAnimate = thumb.animate([
            {transform: 'rotate(360deg)'}
        ], {
            duration: 10000, // 10 seconds
            iterations: Infinity // quay vô hạn
        })
        thumbAnimate.pause()

        // xử lý khi click play
        playBtn.onclick = function() {
            if(_this.isPlaying){
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
            if(audio.duration) {
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
        next_btn.onclick = function () {
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
        back_btn.onclick = function () {
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
        random_btn.onclick = function (e) {
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
            if(_this.isRepeat) {
                audio.play()
            } else {
                next_btn.click()
            }
        };

        // xử lý hành vi click vào playlist
        playlist.onclick = function(e) {
            const SongNode = e.target.closest('.musicList-popular:not(.active)')
            if(SongNode) {
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
        if(this.currentIndex >= this.songs.length){
            this.currentIndex = 0
        }
        this.loadCurrentSong()
    },

    backSong: function() {
        this.currentIndex--
        if(this.currentIndex < 0){
            this.currentIndex = this.songs.length - 1
        }
        this.loadCurrentSong()
    },

    playRandomSong: function () {
        let newIndex;
        do {
          newIndex = Math.floor(Math.random() * this.songs.length);
        } while (newIndex === this.currentIndex);
    
        this.currentIndex = newIndex;
        this.loadCurrentSong();
    },

    start: function(){
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

