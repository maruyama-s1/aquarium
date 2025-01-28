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
                    <!-- ??urlに/homeと表示したい場合どうしたらいい？ -->
                    <btn class="nav-link active menu-home" aria-current="page" href="#">ホーム</bth>
                    <!-- <a class="nav-link active menu-home" aria-current="page" href="#">ホーム</a> -->
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">思い出</a>
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
      <div class="div-main">
        <!-- ホーム -->
        <div class="div-home">
          <section class="sec-1st">
            <h2 class="update">思い出</h2>
            <div class="container-fluid update">
              <div class="row">
                <div class="col-md-6 update hr-center">
                  <img class="img-home-sec1">
                </div>
                <div class="col-md-6 update">
                  <div>
                    <p class="update">このごろ行った水族館</p>
                    <!-- ユーザーの水族館情報 scriptで書き換え -->
                    <table class="tbl-home-sec1"></table>
                    <div class="hr-right">
                      <button class="btn-memory" type="button">もっと見る</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="sec-2nd">
            <h2 class="update">水族館の記録</h2>
            <div class="container-fluid update">
              <div class="row">
                <div class="col-sm-6 update hr-center">
                  <button>
                    <img src="{{asset('storage/img/btn_register.png')}}" alt="記録する" class="btn-add">
                  </button>
                </div>
                <div class="col-sm-6 update hr-center">
                  <button>
                    <img src="{{asset('storage/img/btn_edit.png')}}" alt="編集する" class="btn-edit">
                  </button>
                </div>
              </div>
            </div>
          </section>
        </div>
        <!-- 思い出 一覧、編集 一覧 -->
        <div class="div-memory">
          <section class="sec-1st">
            <h2 class="update">思い出</h2>
            <div>
              <div class="div-number update">
                <!-- 件数 scriptで書き換え -->
              </div>
              <table class="tbl-memory">
                <tr class="tbl-header">
                  <th></th>
                  <th>水族館名</th>
                  <th>いった日</th>
                  <th>ひとこと</th>
                </tr>
                <!-- ユーザーの水族館情報 scriptで書き換え -->
              </table>
              <p class="count"></p>
              <ul class="ul-page pagination">
                <!-- ページネーション scriptで書き換え -->
                <li class="prev"><</li>
                <li class="next">></li>
              </ul>
              <div class="hr-center">
                <button class="btn-home" type="button">ホーム</button>
              </div>
            </div>
          </section>
        </div>
        <!-- 記録 -->
        <div class="div-add">
          <section class="sec-1st">
            <h2 class="update">新しく記録する</h2>
            <div>
              <form action="{{ route('requests.add_visited_info') }}" method="post">
                <table class="tbl-add">
                  <tr>
                    <th>水族館名</th>
                    <td><input type="text" name="aquarium_name"></td>
                  </tr>
                  <tr>
                    <th>いった日</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>ひとこと</th>
                    <td></td>
                  </tr>
                  <tr>
                    <th>写真</th>
                    <td></td>
                  </tr>
                </table>
                <input type="submit">
                <input type="reset">
              </form>
            </div>
          </section>
        </div>
        <!-- リンク2 -->
        <div class="div-link2">

        </div>
      </div>
    </main>
    <footer class="bkg-clr-second">
      <div class="container-fluid update">
        <div class="row">
          <div class="col-md-4 update hr-center">
            <a href="#利用規約リンク">利用規約</a>
          </div>
          <div class="col-md-4 update hr-center">
            <a href="#プライバシーポリシーリンク">プライバシーポリシー</a>
          </div>
          <div class="col-md-4 update hr-center">
            <a href="#お問い合わせリンク">お問い合わせ</a>
          </div>
        </div>
      </div>
      <div class="update hr-center">
        <p class="update">&copy; 2025 suizokukannoomoide</p>
      </div>
    </footer>

    <script>
      // Function
      function loadFinished(){
        // main div homeのみ表示
        // 非表示
        document.getElementsByClassName('div-home')[0].style.display = 'none';
        document.getElementsByClassName('div-memory')[0].style.display = 'none';
        document.getElementsByClassName('div-add')[0].style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementsByClassName('div-home')[0].style.display = 'block';

        // 【main div-home section1】
        // [水族館の画像]
        const imgHome1 = document.getElementsByClassName('img-home-sec1');
        imgHome1[0].src = "{{asset('storage/img/logo.jpg')}}";

        // [ユーザの直近の水族館情報]
        const tblHome1 = document.getElementsByClassName("tbl-home-sec1");

        // ページ更新時テーブル内の行(水族館情報)削除
        if (tblHome1[0].childNodes.length != 0) {
          for (let i = tblHome1[0].childNodes.length - 1; i > -1; i--) {
          // 削除するノードの名前を表示(非表示中)
          // console.log(i + '：' + tblHome1[0].childNodes[i].nodeName);
          // ノードを削除。
          tblHome1[0].removeChild(tblHome1[0].childNodes[i]);
          }
        }

        // tableにapiデータ(水族館情報)を追加
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
            tblHome1[0].appendChild(tr);
          }
        })
        .catch(error => console.error('Error:', error));
      }

      function userAquariumAdd() {
        // div addのみ表示
        // 非表示
        document.getElementsByClassName('div-home')[0].style.display = 'none';
        document.getElementsByClassName('div-memory')[0].style.display = 'none';
        document.getElementsByClassName('div-add')[0].style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementsByClassName('div-add')[0].style.display = 'block';
      }

      function usersAquariumList(){
        // div memoryのみ表示
        // 非表示
        document.getElementsByClassName('div-home')[0].style.display = 'none';
        document.getElementsByClassName('div-memory')[0].style.display = 'none';
        document.getElementsByClassName('div-add')[0].style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementsByClassName('div-memory')[0].style.display = 'block';


        // 【main div-memory section】
        // visited_infoデータ取得
        fetch('api/users_aquarium_data')
        .then((response) => response.json())
        .then((data) => {
          // [表示件数 x件表示]
          const divNumber = document.getElementsByClassName('div-number');
          const number = Object.keys(data).length;
          divNumber[0].textContent = number + '件';

          // ページネーション 初期設定
          let page = 1;
          const step = 5;

          // [現在のページ x/xページ表示]
          const count = (page, step) => {
            const p = document.getElementsByClassName('count');
            const total = (data.length % step == 0) ? (data.length / step) : (Math.floor(data.length / step) + 1);
            p[0].innerText = page + '/' + total + 'ページ';
          }

          // [ユーザの水族館情報表示]
          const show = (page, step) => {
            const tblMemory = document.getElementsByClassName('tbl-memory');

            // ページ更新時テーブル内の見出し以外の行(水族館情報)削除
            if (document.getElementsByClassName('tbl-data').length != 0) {
              for (let i = tblMemory[0].childNodes.length - 1; i > 1; i--) {
              // 削除するノードの名前を表示(非表示中)
              // console.log(i + '：' + tblMemory[0].childNodes[i].nodeName);
              // ノードを削除
              tblMemory[0].removeChild(tblMemory[0].childNodes[i]);
              }
            }

            // tableにapiデータ(水族館情報)を追加
            const first = (page - 1) * step + 1;
            const last = page * step;
            data.forEach((item, i) => {
              if (i < first -1 || i > last - 1) return;

              // 行の追加
              let tr = document.createElement('tr');
              let fragment = document.createDocumentFragment();
              let td1 = document.createElement('td');
              let td2 = document.createElement('td');
              let td3 = document.createElement('td');
              let td4 = document.createElement('td');
              let input = document.createElement('input');

              tr.classList.add('tbl-data');

              input.type = 'checkbox';
              input.name = 'list-check';
              td1.appendChild(input);

              td2.innerText = data[i].aquarium_name;

              td3.innerText = data[i].visited_at;

              td4.innerText = data[i].tweet;

              fragment.append(td1);
              fragment.append(td2);
              fragment.append(td3);
              fragment.append(td4);
              tr.append(fragment);

              tblMemory[0].appendChild(tr);
            });
            count(page, step);

            // 閲覧画面の場合　チェックボタンを非表示にする
            if (checklistState = checklist.OFF) {
              const inputs = document.getElementsByName('list-check');
              for (let i = inputs.length - 1; i >= 0; i--) {
                inputs[0].remove();
              }
            }
          }
          show(page, step);

          // [ページ数表示 <xxx>表示]
          const ulPage = document.getElementsByClassName('ul-page');

          // ページ更新時ページ数(li)削除
          for (let i = ulPage[0].children.length-1; i >= 0; i--) {
            ulPage[0].removeChild(ulPage[0].children[i]);
          }

          // "<"追加 
          const liPrev = document.createElement('li');
          liPrev.classList.add('prev');
          liPrev.innerText = '<';
          ulPage[0].appendChild(liPrev);

          // ページ数追加
          const total = (data.length % step == 0) ? (data.length / step) : (Math.floor(data.length / step) + 1);
          for (i=1; i < total+1; i++){
            let liPage = document.createElement('li');
            liPage.innerText = i;
            ulPage[0].appendChild(liPage);
          }

          // ">"追加
          const liNext = document.createElement('li');
          liNext.classList.add('next');
          liNext.innerText = '>';
          ulPage[0].appendChild(liNext);

          // 前ページ遷移("<"クリック時)
          const prev = document.getElementsByClassName('prev');
          prev[0].addEventListener('click', () => {
            if(page <= 1) return;
            page = page - 1;
            show(page, step);
          });

          // 次ページ遷移(">"クリック時)
          const next = document.getElementsByClassName('next');
          next[0].addEventListener('click', () => {
            if(page >= data.length / step) return;
            page = page + 1;
            show(page, step);
          });
        })
        .catch(error => console.error('Error:', error));
      }


      // Action
      // [フラグ(enum)]
      // チェックリストの表示有無
       const checklist = {
        ON: 0,
        OFF: 1
      };
      let checklistState = checklist.ON;

      // 【画面ロード後処理】
      window.addEventListener('load', loadFinished);

      // 【メニュー】
      const menuHome = document.getElementsByClassName('menu-home');
      menuHome[0].addEventListener('click', loadFinished);

      // 【ホーム】
      // もっとみる ボタン
      const btnMemory = document.getElementsByClassName('btn-memory');
      btnMemory[0].addEventListener('click', function () {
        checklistState = checklist.OFF;
        usersAquariumList();
      });

      // 記録 ボタン
      const btnAdd = document.getElementsByClassName('btn-add');
      btnAdd[0].addEventListener('click', userAquariumAdd);

      // 編集 ボタン
      // これから編集予定

      // 【思い出　ホームボタン】
      const btnHome = document.getElementsByClassName('btn-home');
      btnHome[0].addEventListener('click', loadFinished);

    </script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>