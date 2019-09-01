<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Confirm｜沼本 良</title>
  <link href="https://fonts.googleapis.com/css?family=Bitter:400,700" rel="stylesheet">
  <link href="../css/contact.css" rel="stylesheet">
</head>

<body id="contact">
  <?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'] == '' ? '入力なし' : $_POST['tel'];
    $type = $_POST['type'];
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : "入力なし";
    $message = $_POST['message'] == '' ? '入力なし' : $_POST['message'];

  //   $array = array('りんご', 'もも', 'なし');
  //  $array2 = array('apple'=>'りんご', 'peach'=>'もも', 'pear'=>'なし');
  //  print $array[0];
  //  print $array2['apple'];

    // メール送信
//     $to = 'mail15run79@gmail.com';
//     $mail_sub = '問い合わせ受付';
//     $mail_body = <<<EOM
// 氏名：{$name}\n
// メールアドレス：{$email}\n
// 電話番号：{$tel}\n
// 問い合わせ種別：{$type}\n
// 希望の連絡方法：{$contact}\n
// メッセージ：{$message}\n
// EOM;
//     $mail_body = html_entity_decode($mail_body, ENT_QUOTES, "UTF-8");
//     $mail_head = 'test';
//     mb_language('Japanese');
//     mb_internal_encoding("UTF-8");
//     mb_send_mail($to, $mail_sub, $mail_body, $mail_head);

    // DB登録
    $dsn = 'mysql:dbname=contact_form;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
//     $sql = <<<EOM
// INSERT INTO contents (name, email, tel, type, contact, message) VALUES ("{$name}","{$email}","{$tel}","{$type}","{$contact}","{$message}")
// EOM;
    $sql = <<<EOM
    INSERT INTO contact_info (name,email,tel,type,contact,message) VALUES ("{$name}","{$email}","{$tel}","{$type}","{$contact}","{$message}")
EOM;
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $dbh = null;
  ?>

  <!-- wrap始まり -->
  <div id="wrap">
    <div class="content">
        <div class="main-center">
          <h1>Confirm</h1>
          <p>以下の内容で送信しました。</p>
          <div class="form">
            <dl>
              <dt>お名前</dt>
              <dd><?php print $name ?></dd>
              <dt>メールアドレス</dt>
              <dd><?php print htmlspecialchars($email) ?></dd>
              <dt>お電話番号</dt>
              <dd><?php print htmlspecialchars($tel) ?></dd>
              <dt>お問合せ種別</dt>
              <dd><?php print htmlspecialchars($type) ?></dd>
              <dt>ご希望のご連絡方法</dt>
              <dd><?php print htmlspecialchars($contact) ?></dd>
              <dt>メッセージ</dt>
              <dd><?php print htmlspecialchars($message) ?></dd>
            </dl>
          </div>
          <button onClick="history.back()">戻る</button>
        </div>
    </div>
  </div>

  <!-- footer始まり -->
  <footer>
    <small>(C)2019 Ryo-Numoto.</small>
  </footer>
  <!-- footer終わり -->
</body>

</html>