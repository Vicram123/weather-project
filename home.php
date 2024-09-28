<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //something was posted
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

    //read from database
    $query = "select * from users where user_name = '$user_name' limit 1";
    $result = mysqli_query($con, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {

        $user_data = mysqli_fetch_assoc($result);

        if ($user_data['password'] === $password) {

          $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: index.php");
          die;
        }
      }
    }

    echo "wrong username or password!";
  } else {
    echo "wrong username or password!";
  }
}

?>
<!DOCTYPE html>
<html lang="fi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
  <title>Sääsivusto</title>
  <style>
    html,
    body {
      display: flex;
      flex-direction: column;
      padding: 0;
      font-weight: bold;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url(./image/studio-ochi-ekXxLRsuVF8-unsplash.jpeg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
      background-attachment: fixed;
    }

    th,
    tr {
      font-size: 0.5rem;

    }

    th {
      background-color: #fefdff;
      color: black;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }

    .logo img {
      max-width: 150px;
      height: auto;
    }

    .menu-icon {
      cursor: pointer;
      display: none;
      color: #101935;
    }

    .menu-icon div {
      width: 25px;
      height: 3px;
      background-color: white;
      margin: 5px 0;

    }

    .login-form a {
      color: black;
      text-decoration: none;
      background: #ddd;
      padding: 10px 15px;
      border-radius: 5px;
      border: 1px solid black;
    }

    section {
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      padding: 7rem;
      color: #ddd;
    }

    .table-section {
      border-radius: 5px;
    }

    .table-hero {

      padding: 8rem 0rem;
      border-radius: 5px;
    }

    .inner-table-hero {
      padding: 1rem 3rem;
    }


    .hero-section,
    .table-section {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
    }





    .hero-section {
      display: flex;
      flex-direction: column;
      text-align: start;
    }

    .button-hero {
      display: inline-block;
      margin-top: 20px;
      background-color: black;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 1.2em;
      transition: background-color 0.3s ease;
    }

    .hero-section h1 {
      font-size: 5em;
    }

    .hero-section p {
      color: #fff;
    }



    .table-hero ul {
      display: flex;
      top: 0;
      position: absolute;
      margin: 0;
      padding: 10px 5px;
      justify-items: auto;
      text-decoration: none;
      list-style: none;
    }

    .table-hero ul li {
      padding: 0 6px;
    }

    .table-section {
      text-align: start;
      border: 2px solid black;
    }

    .table-section table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      table-layout: fixed;

    }


    .table-section th,
    .table-section td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .weather-icons {
      text-align: left;
    }

    .clamp {
      white-space: normal;
      font-size: 0.8rem;
    }


    .button-hero-down-footer {
      display: none;
    }

    footer {
      text-align: center;
      padding: 20px;
      background-color: #333;
      color: white;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      header {
        flex-direction: row;
        align-items: flex-start;
        justify-content: space-between;
      }

      .column {

        margin: 0;
      }

      section {
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
      }

      .hero-section {
        justify-content: start;
        padding: 0;
      }

      .hero-section h1 {
        font-size: 3rem;
        text-align: start;
      }

      .login-form {
        display: none;
      }

      .button-hero {
        display: none;
      }

      .button {
        display: none;
      }

      .button-hero-down-footer {
        width: 100%;
        display: block;
        padding: 7rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }

      .menu-icon {
        display: block;
        color: #101935;
      }

      .menu-icon div {
        color: #101935;
      }

      .hero-section h1 {
        font-size: 1.5em;
      }

      .hero-section p {
        font-size: 1em;

      }

      .column {
        padding: 2em 0em;
        margin: 0;
      }


      .table-section table,
      .table-section th,
      .table-section td {
        font-size: 0.8em;
      }

      .weather-icons {
        font-size: 0.85em;
      }

      .button {
        display: none;
      }

      .button-hero-down-footer {
        width: 95%;
        display: block;
        padding: 1.2em;
        background-color: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
      }

      footer {
        font-size: 0.9em;
        color: black;
        display: block;
        padding: 1.5em;
        background-color: #ddd;
      }
    }



    @media (max-width: 480px) {
      header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        position: relative;
      }

      section {
        padding: 3rem 0.5rem;
      }


      .table-hero {
        background: #fff;
        padding: 4rem 0rem;
        border-radius: 5px;
      }


      th {
        text-align: left;
        font-size: 1.6rem;
      }

      tr {
        font-size: 0.5rem;

      }

      .hero-section h1 {
        font-size: 1.3rem;
      }

      .hero-section p {
        font-size: 0.9em;
      }

      .table-section table,
      .table-section th,
      .table-section td {
        font-size: 0.5em;
      }

      .login-form {
        display: none;
      }

      .column {
        padding: 0;
        margin: 0;
      }

      .login-form a {
        padding: 5px 10px;
        font-size: 0.8em;
      }

      .button {
        display: none;
      }

      .button-hero-down-footer {
        width: 85%;
        padding: 2rem;
        background-color: black;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
      }

      .none-display-button {
        text-align: center;
        display: flex;
        justify-content: center;
        padding: 0 2rem 1rem;
        background: #f6f6f6;
      }

      .button-hero {
        bottom: 80px;
        justify-content: center;
        border: 3px solid #73AD21;
      }


      footer {
        font-size: 0.8rem;
        color: black;
        display: block;
        padding: 1.5em;
        background-color: #ddd;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="logo"><img src="./image/Logo dark.png" alt="Logo"></div>
    <div class="menu-icon">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="login-form" style="padding:15px;">
      <a class="button" href="login.php">Kirjaudu</a>
    </div>
  </header>
  <section>
    <div class="hero-section">
      <div class="column">
        <h1>Tervetuloa, kirjaudu sisälle nähdäksesi säätiedot</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dignissim lacinia justo id
          molestie Nunc dignissim lacinia justo id.</p>
        <a class="button-hero" href="login.php">Kirjaudu</a>
      </div>
    </div>

    <div class="table-section ">
      <div class="table-hero" style="position:relative;">
        <ul>
          <li><i class="fas fa-cloud-rain" style="color: #1E90FF;"></i>
          </li>
          <li><i class="fas fa-snowflake" style="color: #ADD8E6;"></i>
          </li><i class="fas fa-temperature-high" style="color: #FF4500;"></i>
          </li>
        </ul>
        <div class="inner-table-hero">
          <h2>Kuopio</h2>
          <p>Säätiedot 02.-08.01.2023</p>
          <table>
            <thead>
              <tr>
                <th></th>
                <th>02.01.2023</th>
                <th>03.01.2023</th>
                <th>04.01.2023</th>
                <th>05.01.2023</th>
                <th>06.01.2023</th>
                <th>07.01.2023</th>
                <th>08.01.2023</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="weather-icons clamp"><i class="fas fa-cloud-rain" style="color: #1E90FF;"></i>Sademäärä (mm)
                </td>
                <td>0.2</td>
                <td>2.1</td>
                <td>2.0</td>
                <td>0.1</td>
                <td>-1</td>
                <td>0.1</td>
                <td>-1</td>
              </tr>
              <tr>
                <td class="weather-icons clamp"><i class="fas fa-snowflake" style="color: #ADD8E6;"></i>Lumensyvyys (cm)
                </td>
                <td>14</td>
                <td>12</td>
                <td>13</td>
                <td>16</td>
                <td>15</td>
                <td>15</td>
                <td>14</td>
              </tr>
              <tr>
                <td class="weather-icons clamp"><i class="fas fa-temperature-high" style="color: #FF4500;"></i>Ylin
                  lämpötila (degC)</td>
                <td>-0.1</td>
                <td>-0.3</td>
                <td>-2.7</td>
                <td>-3.7</td>
                <td>-11.9</td>
                <td>-7.9</td>
                <td>-6.9</td>
              </tr>
              <tr>
                <td class="weather-icons clamp"><i class="fas fa-temperature-low" style="color: #1E90FF;"></i>Alin
                  lämpötila (degC)</td>
                <td>-2.5</td>
                <td>-3.5</td>
                <td>-3.9</td>
                <td>-13.1</td>
                <td>-15.8</td>
                <td>-15.0</td>
                <td>-8.0</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <div class="none-display-button">
    <a class="button-hero-down-footer " href="login.php">Kirjaudu</a>
  </div>
  <footer>
    <strong> Etu- ja Sukunimi | Oppilaitos </strong><br />
    &copy; Taitaja 2023
  </footer>

</body>

</html>