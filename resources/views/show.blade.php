<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>aquarium-HOME</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <header>
      <div class="container-fluid">
        <div class="row">
          <!-- Navbar show/hide switch(Medium:768px～) -->
          <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
              <!-- Logo -->
              <a class="navbar-brand" href="#">
                <img src="{{asset('storage/img/logo.jpg')}}" alt="logo">
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
    <main>
      <div id="main-div">
      <!-- javascript loadFinished -->
      </div>
      <!-- 以下、確認用 -->
      <!-- <h2>
        sample
      </h2> -->
    </main>
    <footer>
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
        <p>&copy; 2025 suizokukannoomoide</p>
      </div>
    </footer>

    <script>
      function loadFinished(){
        const mainDiv = document.getElementById('main-div');


        // body main sectionInfo
        const sectionInfo = document.createElement('section');
        mainDiv.appendChild(sectionInfo);


        // body main sectionInfo 見出し追加
        const h2Info = document.createElement('h2');
        h2Info.textContent = '思い出';
        sectionInfo.appendChild(h2Info);


        // body main sectionInfo ユーザに紐づく水族館情報の追加
        const divInfo1 = document.createElement('div');
        divInfo1.classList.add('container-fluid');
        sectionInfo.appendChild(divInfo1);

        const divInfo2 = document.createElement('div');
        divInfo2.classList.add('row');
        divInfo1.appendChild(divInfo2);

        const divInfo3_1 = document.createElement('div');
        const divInfo3_2 = document.createElement('div');
        divInfo3_1.classList.add('col-md-6');
        divInfo3_2.classList.add('col-md-6');
        divInfo2.appendChild(divInfo3_1);
        divInfo2.appendChild(divInfo3_2);

        // 水族館の画像
        const imgInfo = document.createElement('img');
        imgInfo.src = "{{asset('storage/img/logo.jpg')}}";
        divInfo3_1.appendChild(imgInfo);

        // 直近のユーザの水族館情報
        const divInfo4 = document.createElement('div');
        divInfo3_2.appendChild(divInfo4);

        const pInfo = document.createElement('p');
        pInfo.textContent = 'このごろ行った水族館';
        divInfo4.appendChild(pInfo);

        const tableInfo = document.createElement('table');
        
        // Laravelの変数を定義
        const visited_info = @json($visited_info); // ユーザの水族館情報
        
        for (let i = 0; i < 3; i++) {
          const tr = document.createElement('tr');
          for (let j = 0; j < 3; j++) {
            const td = document.createElement('td');
            if (j == 0) {
              td.textContent = visited_info[i]['visited_at'];
            } else if (j == 1) {
              td.textContent = visited_info[i]['aquarium_name'];
            } else if (j == 2) {
              const now = new Date();
              const visited_at = new Date(visited_info[i]['visited_at']);
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
          tableInfo.appendChild(tr);
        }
        divInfo4.appendChild(tableInfo);

        // もっとみるリンク
        const aInfo = document.createElement('a');
        aInfo.href = "#思い出を振り返る-一覧へのリンク";
        aInfo.textContent = 'もっとみる';
        divInfo4.appendChild(aInfo);


        // body main sectionEdit
        const sectionEdit = document.createElement('section');
        mainDiv.appendChild(sectionEdit);


        // body main sectionEdit 見出し追加
        const h2Edit = document.createElement('h2');
        h2Edit.textContent = '水族館の記録';
        sectionEdit.appendChild(h2Edit);


        // body main sectionEdit ユーザー水族館情報の登録ボタン追加
        const divEdit1 = document.createElement('div');
        divEdit1.classList.add('container-fluid');
        sectionEdit.appendChild(divEdit1);

        const divEdit2 = document.createElement('div');
        divEdit2.classList.add('row');
        divEdit1.appendChild(divEdit2);

        const divEdit3_1 = document.createElement('div');
        const divEdit3_2 = document.createElement('div');
        divEdit3_1.classList.add('col-md-6');
        divEdit3_2.classList.add('col-md-6');
        divEdit2.appendChild(divEdit3_1);
        divEdit2.appendChild(divEdit3_2);
      
        // ユーザ水族館情報登録ボタン追加
        const btnEdit1 = document.createElement('button');
        const imgEdit1 = document.createElement('img');
        imgEdit1.src = "{{asset('storage/img/btn_register.png')}}";
        btnEdit1.appendChild(imgEdit1);
        divEdit3_1.appendChild(btnEdit1);
        
        // ユーザ水族館情報編集ボタン追加
        const btnEdit2 = document.createElement('button');
        const imgEdit2 = document.createElement('img');
        imgEdit2.src = "{{asset('storage/img/btn_edit.png')}}";
        btnEdit2.appendChild(imgEdit2);
        divEdit3_2.appendChild(btnEdit2);
      }
      // 画面ロード後処理
      window.addEventListener('load', loadFinished);
    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>