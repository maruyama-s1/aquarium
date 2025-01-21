<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>aquarium-HOME</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body class="update bkg-clr-main">
    <header class="bkg-clr-second">
      <div class="container-fluid">
        <div class="row">
          <!-- Navbar show/hide switch(Medium:768px～) -->
          <nav class="navbar navbar-expand-md bkg-clr-accent1">
            <div class="container-fluid">
              <!-- Logo -->
              <a class="navbar-brand" href="#">
                <img src="{{asset('storage/img/logo.jpg')}}" alt="logo" class="logo">
              </a>
              <!-- Hamburger menu -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <!-- Navigation menu -->
              <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto me-md-1 mb-2 mb-md-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <main class="bkg-clr-second">
      <!-- JavaScript rewrite -->
      <div class="main-div">
        <!-- ホーム -->
        <div class="home">
          <section>
            <h2 class="update">思い出</h2>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 hr-center">
                  <img class="photo">
                </div>
                <div class="col-md-6">
                  <div>
                    <p class="update">このごろ行った水族館</p>
                    <table class="tbl"><!-- scriptで書き換え --></table>
                    <button class="btn-more" type="button">もっと見る</button>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <h2 class="update">水族館の記録</h2>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 hr-center">
                  <button>
                    <img src="{{asset('storage/img/btn_register.png')}}">
                  </button>
                </div>
                <div class="col-md-6 hr-center">
                  <button>
                    <img src="{{asset('storage/img/btn_edit.png')}}">
                  </button>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="link1">
          <!-- リンク1 -->
        </div>
        <div class="link2">
          <!-- リンク2 -->
        </div>
      </div>
      <!-- 以下、確認用 -->
      <!-- <h2>
        sample
      </h2> -->
    </main>
    <footer class="bkg-clr-second">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <a href="#利用規約リンク">利用規約</a>
          </div>
          <div class="col-md-4">
            <a href="#プライバシーポリシーリンク">プライバシーポリシー</a>
          </div>
          <div class="col-md-4">
            <a href="#お問い合わせリンク">お問い合わせ</a>
          </div>
        </div>
      </div>
      <div>
        <p class="update">&copy; 2025 suizokukannoomoide</p>
      </div>
    </footer>

    <script>
      // Function
      function loadFinished(){
        const mainDiv = document.getElementsByClassName('main-div');

        // main section 思い出
        // 水族館の画像
        const ImgInfo = document.getElementsByClassName('photo');
        ImgInfo[0].src = "{{asset('storage/img/logo.jpg')}}";

        // ユーザの直近の水族館情報
        const tblInfo = document.getElementsByTagName("table")

        // tableにapiデータを追加
        fetch('api/users_aquarium_data')
        .then((response) => response.json())
        .then((data) => {
          for (let i = 0; i < 3; i++) {
            const tr = document.createElement('tr');
            for (let j = 0; j < 3; j++) {
              const td = document.createElement('td');
              if (j == 0) {
                td.textContent = data[i]['visited_at'];
              } else if (j == 1) {
                td.textContent = data[i]['aquarium_name'];
              } else if (j == 2) {
                const now = new Date();
                const visited_at = new Date(data[i]['visited_at']);
                const diff = now.getTime() - visited_at.getTime();
                console.log(diff)
                const elapsed_day = Math.floor(diff / 1000 / 60 / 60 / 24); // ミリ秒→日
                if (elapsed_day < 7) {
                  td.textContent = elapsed_day + '日前';
                } else if (elapsed_day < 32) {
                  elapsed_week =  Math.floor(diff / 1000 / 60 / 60 / 24 / 7); // ミリ秒→週間
                  td.textContent = elapsed_week + '週間前';
                } else if (elapsed_day < 365) {
                  elapsed_month = (now.getFullYear() * 12 + now.getMonth()) - (visited_at.getFullYear() * 12 + visited_at.getMonth());
                  td.textContent = elapsed_month + 'ヶ月前';
                } else if (elapsed_day >= 365) {
                  elapsed_year = (now.getFullYear() - visited_at.getFullYear());
                  td.textContent = elapsed_year + '年前';
                }
              }
              tr.appendChild(td);
            }
            tblInfo[0].appendChild(tr);
          }
        })
        .catch(error => console.error('Error:', error));
      }


      // Action
      // 画面ロード後処理
      window.addEventListener('load', loadFinished);

      // 思い出　もっと見るボタンクリック後処理
      const btnMore = document.getElementById('btn-more');

    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>