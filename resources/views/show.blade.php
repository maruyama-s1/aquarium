<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>aquarium-HOME</title>
    <!-- Vita-Bootstrap, css, jsの読み込み -->
    @vite(['resources/scss/styles.scss', 'resources/js/app.js', 'resources/css/style.css'])
    <!-- *css-Vita使用のため非表示 -->
    <!-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> -->
    <!-- *Bootstrap css-Vita使用のため非表示 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  </head>
  <body class="block--default-style block--bkg-clr-main">
    <header class="block--bkg-clr-second">
      <div class="container-fluid">
        <div class="row">
          <!-- Navbar show/hide switch(Medium:768px～) -->
          <nav class="navbar navbar-expand-md block--bkg-clr-accent1">
            <div class="container-fluid">
              <!-- Logo -->
              <a class="navbar-brand" href="#">
                <img src="{{asset('storage/img/logo.jpg')}}" alt="logo" class="navbar__logo">
              </a>
              <!-- Hamburger menu -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> <!-- ?? imgで画像に変更可能 -->
              </button>
              <!-- Navbar menu -->
              <div id="navbarSupportedContent" class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav me-auto me-md-1 mb-2 mb-md-0">
                  <li class="nav-item">
                    <!-- *jsでページ書き換えを行うため、ナビゲーションはリンクではなくボタンに変更 -->
                    <!-- ?? active, aria-current="page"は後ほど設定 -->
                    <!-- <btn class="nav-link active home__btn" aria-current="page">ホーム</bth> -->
                    <btn class="nav-link active home__btn">ホーム</bth>
                  </li>
                  <li class="nav-item">
                    <btn class="nav-link memory__btn">思い出</bth>
                  </li>
                  <li class="nav-item">
                    <btn class="nav-link recode__btn">記録</bth>
                  </li>
                  <li class="nav-item">
                    <!-- ?? 編集画面ができたら以下のコメントアウトを外す -->
                    <!-- <btn class="nav-link edit__btn">編集</bth> -->
                    <a class="nav-link" href="#">Link</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <main class="block--bkg-clr-second">
      <div class="main__div">
        <!-- ホーム -->
        <div id="home__div">
          <section class="home__sec-memory">
            <h2 class="heading--default-style">思い出</h2>
            <div class="container-fluid div--default-style">
              <div class="row">
                <div class="col-md-6 div--default-style base--align-c">
                  <img class="home__img"><!-- ユーザーの水族館画像 scriptで書き換え -->
                </div>
                <div class="col-md-6 div--default-style">
                  <div>
                    <p class="txt--default-style">このごろ行った水族館</p>
                    <table class="home__tbl">
                      <!-- ユーザーの水族館情報 scriptで書き換え -->
                    </table>
                    <div class="base--align-r">
                      <button class="memory__btn" type="button">もっと見る</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="home__sec-recode-edit">
            <h2 class="heading--default-style">水族館の記録</h2>
            <div class="container-fluid div--default-style">
              <div class="row">
                <div class="col-sm-6 div--default-style base--align-c">
                  <button>
                    <img src="{{asset('storage/img/btn_register.png')}}" alt="記録する" class="recode__btn">
                  </button>
                </div>
                <div class="col-sm-6 div--default-style base--align-c">
                  <button>
                    <img src="{{asset('storage/img/btn_edit.png')}}" alt="編集する" class="edit__btn">
                  </button>
                </div>
              </div>
            </div>
          </section>
        </div>
        <!-- 思い出 一覧、編集 一覧 -->
        <div id="memory__div">
          <section class="memory__sec">
            <h2 class="heading--default-style">思い出</h2>
            <div>
              <div class="memory__count div--default-style">
                <!-- 思い出件数 scriptで書き換え -->
              </div>
              <table class="memory__tbl">
                <tr class="tbl-header--default-style">
                  <th></th>
                  <th>水族館名</th>
                  <th>いった日</th>
                  <th>ひとこと</th>
                </tr>
                <!-- ユーザーの水族館情報 scriptで書き換え -->
              </table>
              <p class="memory__page-count"></p>
              <ul class="pagination memory__pagination">
                <!-- ページネーション scriptで書き換え -->
              </ul>
              <div class="base--align-c">
                <button class="home__btn" type="button">ホーム</button>
              </div>
            </div>
          </section>
        </div>
        <!-- 記録 -->
        <div id="recode__div">
          <section class="recode__sec">
            <h2 class="heading--default-style">新しく記録する</h2>
            <div>
              <!-- *フォームは非同期処理でデータを送信するため、actionなどは非表示 -->
              <!-- <form action="{{ route('requests.add_visited_info') }}" method="post" enctype="multipart/form-data"> -->
              <form id=recode__form>
                @csrf
                <!-- フォーム入力 -->
                <table class="recode__form-tbl">
                  <tr>
                    <th>水族館名</th>
                    <td>
                      <input type="text" name="aquarium_name">
                    </td>
                  </tr>
                  <tr>
                    <th>いった日</th>
                    <td>
                      <input type="date" name="visited_date" >
                    </td>
                  </tr>
                  <tr>
                    <th>ひとこと</th>
                    <td>
                      <textarea name="tweet" rows="5" cols="30" placeholder="ひとこと"></textarea>
                    </td>
                  </tr>
                  <tr>
                    <th>写真</th>
                    <td>
                      <input type="file" name="aquarium_images[]" accept=".png, .PNG, .jpg, .JPG" multiple>
                      <div class="recode__form-img">
                        <!-- 写真表示 scriptで書き換え -->
                      </div>
                    </td>
                  </tr>
                </table>
                <button type="button" name="recode__form-btn--conf" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                  登録確認
                </button>
                <button type="reset" name="recode__form-btn--clear" class="btn btn-primary">リセット</button>
                <!-- モーダル　*...(1) -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">登録内容</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <table>
                          <tbody>
                            <tr id="recode__modal--aquarium-name">
                              <th>水族館名</th>
                              <td>：</td>
                            </tr>
                            <tr id="recode__modal--visited-date">
                              <th>いった日</th>
                              <td>：</td>
                            </tr>
                            <tr id="recode__modal--tweet">
                              <th>ひとこと</th>
                              <td>：</td>
                            </tr>
                            <tr id="recode__modal--aquarium-images">
                              <th>写真</th>
                              <td>：</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">戻る</button>
                        <button type="submit" name="recode__btn--subm" class="btn btn-primary" data-bs-dismiss="modal">登録</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <div class="base--align-c">
                <button class="home__btn" type="button">ホーム</button>
              </div>
            </div>
          </section>
        </div>
        <!-- メッセージ ??-->
        <div id="msg__div">
          <h2 class="heading--default-style" id="msg__heading">
            <!-- h2 scriptで書き換え -->
          </h2>
          <div id="msg__div-txt">
            <!-- メッセージ scriptで書き換え -->
          </div>
          <div class="base--align-c">
            <button class="home__btn" type="button">ホーム</button>
          </div>
        </div>
        <!-- ?? リンク2 -->
        <div class="div-link2">

        </div>
      </div>
    </main>
    <footer class="block--bkg-clr-second">
      <div class="container-fluid div--default-style">
        <div class="row">
          <div class="col-md-4 div--default-style base--align-c">
            <a href="#利用規約リンク">利用規約</a>
          </div>
          <div class="col-md-4 div--default-style base--align-c">
            <a href="#プライバシーポリシーリンク">プライバシーポリシー</a>
          </div>
          <div class="col-md-4 div--default-style base--align-c">
            <a href="#お問い合わせリンク">お問い合わせ</a>
          </div>
        </div>
      </div>
      <div class="div--default-style base--align-c">
        <p class="txt--default-style">&copy; 2025 suizokukannoomoide</p>
      </div>
    </footer>

    <script>
      // Function
      // ホーム - 画面構成
      function loadFinished(){
        // ホーム画面を表示
        // 非表示
        document.getElementById('home__div').style.display = 'none';
        document.getElementById('memory__div').style.display = 'none';
        document.getElementById('recode__div').style.display = 'none';
        document.getElementById('msg__div').style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementById('home__div').style.display = 'block';

        // 【main home__div section1】
        // DBデータ取得・表示
        // [水族館の画像]
        const imgHome1 = document.getElementsByClassName('home__img');
        imgHome1[0].src = "{{asset('storage/img/logo.jpg')}}";

        // [ユーザの直近の水族館情報]
        const tblHome1 = document.getElementsByClassName("home__tbl");

        // 前回データ削除
        if (tblHome1[0].childNodes.length != 0) {
          for (let i = tblHome1[0].childNodes.length - 1; i > -1; i--) {
          // 削除するノードの名前を表示(非表示中)
          // console.log(i + '：' + tblHome1[0].childNodes[i].nodeName);
          // ノードを削除
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

      // 思い出一覧 -画面構成
      function usersAquariumList(){
        // div memoryのみ表示
        // 非表示
        document.getElementById('home__div').style.display = 'none';
        document.getElementById('memory__div').style.display = 'none';
        document.getElementById('recode__div').style.display = 'none';
        document.getElementById('msg__div').style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementById('memory__div').style.display = 'block';


        // 水族館情報表示
        // visited_infoデータ取得
        fetch('api/users_aquarium_data')
        .then((response) => response.json())
        .then((data) => {
          // [表示件数 x件表示]
          const divNumber = document.getElementsByClassName('memory__count');
          const number = Object.keys(data).length;
          divNumber[0].textContent = number + '件';

          // ページネーション
          // 初期設定
          let page = 1;
          const step = 10;
          const ulPage = document.getElementsByClassName('memory__pagination');

          const count = (page, step) => {
            // [現在のページ x/xページ表示]
            // const p = document.getElementsByClassName('memory__page-count');
            const total = (data.length % step == 0) ? (data.length / step) : (Math.floor(data.length / step) + 1);
            // p[0].innerText = page + '/' + total + 'ページ';

            // [ページ数表示 <xxx>表示]
            // 前回データ削除
            for (let i = ulPage[0].children.length-1; i >= 0; i--) {
              ulPage[0].removeChild(ulPage[0].children[i]);
            }

            // "<"追加 
            const liPrev = document.createElement('li');
            liPrev.classList.add('prev');
            liPrev.innerText = '<';
            ulPage[0].appendChild(liPrev);

            // ページ数追加
            const liPage = document.createElement('li');
            liPage.innerText = page + '/' + total + 'ページ';
            ulPage[0].appendChild(liPage);

            // ">"追加
            const liNext = document.createElement('li');
            liNext.classList.add('next');
            liNext.innerText = ' >';
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
          }

          // [ユーザの水族館情報表示]
          const show = (page, step) => {
            const tblMemory = document.getElementsByClassName('memory__tbl');

            // 前回データ削除
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
        })
        .catch(error => console.error('Error:', error));
      }

      // 思い出記録 -画面構成
      // グローバル変数
      let fileList = []; // 写真保持用リスト

      function userAquariumAdd() {
        // div addのみ表示
        // 非表示
        document.getElementById('home__div').style.display = 'none';
        document.getElementById('memory__div').style.display = 'none';
        document.getElementById('recode__div').style.display = 'none';
        document.getElementById('msg__div').style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementById('recode__div').style.display = 'block';
      }

      // 思い出記録 -選択ファイル表示
      const aquariumImage = document.getElementsByName('aquarium_images[]');
      const divPv = document.getElementsByClassName('recode__form-img');

      aquariumImage[0].addEventListener('change', () => {
        // 写真プレビュー表示
        const imgFiles = aquariumImage[0].files; // 選択した写真のデータ

        // imgFiles用のimgタグを1つずつ作成
        for (i = 0; i < imgFiles.length; i++) {
          const rd = new FileReader();
          rd.onload = function() {
            const imgPv = document.createElement('img');
            imgPv.src = rd.result;
            imgPv.name = "img-pv";
            divPv[0].appendChild(imgPv);
          };
          rd.readAsDataURL(imgFiles[i]);
        }

        // アップロードした写真の保持
        const dt = new DataTransfer();
        const uploaded = aquariumImage[0].files;

        // 既存の写真データをDataTransferオブジェクトのアイテムリストに追加
        fileList.forEach((file) => {
          dt.items.add(file);
        })
        // いくつの既存データがあるか表示（非表示中）
        // console.log('退避' + dt.items.length);

        // 新規の写真データをDataTransferオブジェクトのアイテムリストに追加と写真保存用リストに追加
        for (let i = 0; i < uploaded.length; i++) {
          dt.items.add(uploaded[i]);
          fileList.push(uploaded[i]);
        }
        // いくつの写真データ（既存・新規）があるか表示（非表示中）
        // console.log('新規' + dt.items.length);

        // フォーム type="file"に全ての写真データを格納する
        aquariumImage[0].files = dt.files;
      });

      // 思い出記録 -登録確認
      function userAquariumConf() {
        // フォームデータ取得
        const aquariumName = document.getElementsByName('aquarium_name')[0].value;
        const visitedDate = document.getElementsByName('visited_date')[0].value;
        const tweet = document.getElementsByName('tweet')[0].value;
        const aquariumImages = document.getElementsByName('aquarium_images[]')[0].files;

        // モーダル 登録内容確認
        // 水族館名
        const modalAquariumName = document.getElementById('recode__modal--aquarium-name');
        // 前回内容の削除
        for (i = modalAquariumName.childElementCount - 1; i > 1; i--) {
          modalAquariumName.children[i].remove();
        }
        // 新規内容の追加
        const td1 = document.createElement("td");
        td1.innerHTML = aquariumName
        modalAquariumName.append(td1);

        // いった日
        const modalVisitedDate = document.getElementById('recode__modal--visited-date');
        // 前回内容の削除
        for (i = modalVisitedDate.childElementCount - 1; i > 1; i--) {
          modalVisitedDate.children[i].remove();
        }
        // 新規内容の追加
        const td2 = document.createElement("td");
        td2.innerHTML = visitedDate;
        modalVisitedDate.append(td2);

        // ひとこと ??確認画面で改行が空白に置き換わるため確認
        const modalTweet = document.getElementById('recode__modal--tweet');
        // 前回内容の削除
        for (i = modalTweet.childElementCount - 1; i > 1; i--) {
          modalTweet.children[i].remove();
        }
        // 新規内容の追加
        const td3 = document.createElement("td");
        td3.innerHTML = tweet;
        modalTweet.append(td3);

        // 写真 ??Bootstrapのグリッドシステムで写真位置調整
        const modalAquariumImages = document.getElementById('recode__modal--aquarium-images');
        // 前回内容の削除
        for (i = modalAquariumImages.childElementCount - 1; i > 1; i--) {
          modalAquariumImages.children[i].remove();
        }
        // 新規内容の追加
        const td4 = document.createElement("td");
        for (i = 0; i < aquariumImages.length; i++) {
          const rd = new FileReader();
          rd.onload = function() {
            const imgPv = document.createElement('img');
            imgPv.src = rd.result;
            imgPv.name = "img-pv";
            td4.appendChild(imgPv);
          };
          rd.readAsDataURL(aquariumImages[i]);
        }
        modalAquariumImages.append(td4);
      }

      // 思い出記録 - クリア
      function userAquariumClear() {
        const aquariumImage = document.getElementsByName('aquarium_images[]');
        const divPv = document.getElementsByClassName('recode__form-img');
        // 前回内容の削除（写真のみ）
        for (i = divPv[0].childElementCount - 1; i > -1; i--) {
          divPv[0].children[i].remove();
        }
        // 保持してる写真(グローバル変数)を削除
        fileList = [];
      }

      //思い出記録 - 登録完了
      function userAquariumSubm(data) {
        // div msgのみ表示
        // 非表示
        document.getElementById('home__div').style.display = 'none';
        document.getElementById('memory__div').style.display = 'none';
        document.getElementById('recode__div').style.display = 'none';
        document.getElementById('msg__div').style.display = 'none';
        document.getElementsByClassName('div-link2')[0].style.display = 'none';
        // 表示
        document.getElementById('msg__div').style.display = 'block';

        // ?? メッセージ エレメント取得できてない
        // const divMsg = document.getElementsByClassName('msg__div');
        const h2Msg = document.getElementById('msg__heading');
        const divMsg = document.getElementById('msg__div-txt');
        // 前回内容の削除
        for (i = divMsg.childElementCount - 1; i > -1; i--) {
          divMsg.children[i].remove();
        }
        // 新規内容の追加
        // const h2 = document.createElement('h2');
        // h2Msg.classList.add('msg__heading');
        h2Msg.innerText = '新しく記録する';
        // divMsg[0].append(h2);

        const p1 = document.createElement('p');
        p1.innerText = '登録が完了しました。';
        divMsg.append(p1);

        const p2 = document.createElement('p');
        p2.innerText = `${data.message}`;
        divMsg.append(p2);

        // ??if文で遷移元画面ごとに表示文言を変更する（フォーム登録、編集）
      }

      // ?? エラーハンドリング用の関数　余裕があるときに検討
      // function handleError(error) {
      //   console.error('エラー:', error);
      //   document.getElementById('message').textContent = 'エラーが発生しました。再度お試しください。';
      // }


      // Action
      // [フラグ(enum)]
      // チェックリストの表示有無
      const checklist = {
        ON : 0,
        OFF : 1
      };
      let checklistState = checklist.ON;

      // 【画面ロード後処理】
      window.addEventListener('load', loadFinished);

      // 【ホーム】
      // 遷移元ボタン：navbar-ホーム memory-ホーム ??recode-ホーム
      const homeBtns = document.getElementsByClassName('home__btn');
      for (let homeBtn of homeBtns) {
        homeBtn.addEventListener('click', loadFinished);
      }

      // 【思い出】
      // 遷移元ボタン：navbar-思い出 home-もっとみる
      const memoryBtns = document.getElementsByClassName('memory__btn');
      for (let memoryBtn of memoryBtns) {
        memoryBtn.addEventListener('click', function () {
          checklistState = checklist.OFF;
          usersAquariumList()
        });
      }

      // 【記録】
      // 遷移元ボタン：navbar-記録 home-記録
      const recodeBtns = document.getElementsByClassName('recode__btn');
      for (let recodeBtn of recodeBtns) {
        recodeBtn.addEventListener('click', userAquariumAdd);
      }

      // ボタン-登録確認
      const recodeBtnConf = document.getElementsByName('recode__form-btn--conf');
      recodeBtnConf[0].addEventListener('click', userAquariumConf);

      // ボタン-クリア
      const recodeBtnClear = document.getElementsByName('recode__form-btn--clear');
      recodeBtnClear[0].addEventListener('click', userAquariumClear);

      // ?? 登録 ボタン *...(1)
      const formAddVisitedInfo = document.getElementById('recode__form');
      const recodeBtnSubm = document.getElementsByName('recode__btn--subm');
      formAddVisitedInfo.addEventListener('submit', function(event) {
        event.preventDefault();  // フォームの送信ではなく非同期処理でデータをやり取りするため、ページリロードなどフォームのデフォルト動作をキャンセルする
        recodeBtnSubm[0].disabled = true;  // 登録ボタンを非活性化

        const formData = new FormData(this); // フォームデータ送信のためのオブジェクトを作成

        // 非同期処理によるデータ送受信
        fetch("{{ route('requests.add_visited_info') }}", {
          method: 'POST',
          // *responseをJSONに変換するため、サーバーがレスポンスをJSON形式で返すよう指定
          headers: {
            'Accept': 'application/json',  // サーバーがJSONでレスポンスを返すように要求
          },
          body: formData,
        })
        .then(response => {
          // レスポンスが正常な場合
          if (response.ok) {
            recodeBtnSubm[0].disabled = false;  // 登録ボタンを活性化

            // フォーム内の空白処理
            formAddVisitedInfo.reset();  // フォームを空にする
            
            const aquariumImage = document.getElementsByName('aquarium_images[]');
            const divPv = document.getElementsByClassName('recode__form-img');

            for (i = divPv[0].childElementCount - 1; i > -1; i--) {    // 写真を空にする
              divPv[0].children[i].remove();
            }

            fileList = [];  // 保持してる写真(グローバル変数)を削除

            // レスポンス
            return response.json();  // レスポンスをJSONで返す
          }
          // レスポンスがエラーの場合
          return response.json().then(data => {
            recodeBtnSubm[0].disabled = false;  // 登録ボタンを活性化

            // バリデーションエラーの処理 *...(2)
            let errorMessages = [];
            for (let field in data.errors) {
              if (data.errors.hasOwnProperty(field)) {  // data.errorsのプロパティのみ参照する
                errorMessages.push(...data.errors[field]);  // 各エラーメッセージを配列に追加
              }
            }

            // 複数のエラーメッセージをまとめて1つのアラートに表示  ??アラートのタイトルを変更する
            if (errorMessages.length > 0) {
              alert('バリデーションエラー:\n' + errorMessages.join('\n')); // 改行でエラーメッセージを区切って表示
            }

            throw new Error('登録に失敗しました。');

          });
        })
        .then(userAquariumSubm) // 登録完了画面を生成する関数の実行
        .catch(error => {
          console.error('エラー:', error);
        });
      });

      // 【編集】

    </script>
    <!-- Bootstrap js-Vita使用のため非表示 -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
    
  </body>
</html>