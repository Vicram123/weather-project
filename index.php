<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
// Check for welcome message
if (isset($_SESSION['welcome_message'])) {
  echo "<div class='welcome'>{$_SESSION['welcome_message']}</div>";
  unset($_SESSION['welcome_message']); // Unset the message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
  <title>Welcome Page</title>
  <style>
    html,
    body {
      display: flex;
      flex-direction: column;
      padding: 0;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-image: url(./image/hendrik-morkel-Cvj4LJIHJ3Q-unsplash.jpeg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      height: 100vh;
      background-attachment: fixed;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }

    .welcome {
      background-color: #dff0d8;
      color: #3c763d;
      padding: 15px;
      margin: 20px 0;
      border: 1px solid #d6e9c6;
      border-radius: 5px;
    }

    .logo img {
      height: 50px;
      width: auto;

    }

    .menu-icon {
      display: flex;
      flex-direction: column;
      cursor: pointer;
    }

    .login-form {
      display: flex;
      align-items: center;
      /* Center items vertically */
      padding: 15px;
    }

    section {
      flex: 1;
      display: flex;
      flex-direction: column;

    }


    .column h1 {
      font-size: clamp(12px, 5vw, 18px);

    }

    .hero-section {
      display: flex;
      flex-direction: column;
      text-align: start;
      padding: 40px;
    }

    .button-hero {
      display: inline-block;
      margin-top: 20px;
      background-color: #ddd;
      color: black;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 1.2em;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .hero-section h1 {
      font-size: 4em;
      color: white;
    }

    .hero-section p {
      color: white;
    }

    .table-section {
      text-align: start;
      color: white;
    }

    .table-section table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      table-layout: fixed;
      font-size: 1em;
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



    footer {
      font-size: 1rem;
      text-align: center;
      width: 100%;
      color: black;
      display: block;
      padding: 1.5em;
      background-color: #ddd;
      position: fixed;
      bottom: 0;

    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      header {
        flex-direction: row;
        align-items: flex-start;
        justify-content: space-between;
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

      .column {

        margin: 0;
      }

      section {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 1.5rem;
      }

      .hero-section {
        justify-content: start;
        padding-bottom: 3rem;
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

      .table-section {
        text-align: start;
        padding: 10px;
      }

      .table-section table,
      .table-section th,
      .table-section td {
        font-size: 0.9em;
      }

      .weather-icons {
        font-size: 0.85em;
      }

      .button {
        display: none;
      }



      footer {
        font-size: 0.9rem;
        color: black;
        display: block;
        padding: 1.5em;
        background-color: #ddd;
        position: fixed;
        bottom: 0;

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
        padding: 7rem 0.5rem;

      }


      .hero-section {
        padding: 0;
        text-align: center;
      }

      th,
      tr {
        font-size: clamp(10px, 0.2vw, 15px);

      }

      .hero-section h1 {
        font-size: 1.4rem;
        color: white;
      }

      .hero-section p {
        font-size: 0.9em;
        color: white;
        text-align: start;
      }

      .table-section table,
      .table-section th,
      .table-section td {
        font-size: 0.8em;
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

      footer {
        font-size: 0.8rem;
        color: black;
        display: block;
        padding: 1.5em;
        background-color: #ddd;
        position: fixed;
        bottom: 0;

      }
    }
  </style>
  </style>
</head>

<body>
  <header>
    <div class="logo"><img src="./image/Logo light.png"></div>
    <div class="menu-icon">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="login-form">
      <form action="logout.php" method="POST">
        <button class="button-hero" type="submit">Logout</button>
      </form>
    </div>
  </header>
  <section>
    <div class="hero-section">
      <div class="column">
        <h1><strong>Kuopio </strong></h1>
        <p style=" padding-bottom: 5em;">Säilitetod 02.01.2023</p>
      </div>
    </div>

    <div class="table-section ">
      <div class="table-hero">

        <table id="weatherTable">
          <thead>
            <!-- Thead will be populated by JavaScript -->
          </thead>
          <tbody>
            <!-- Data will be populated here by JavaScript -->
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <script src="script.js"></script>
  <footer style="margin-top: 3rem; color: #000;">
    Etu- ja Sukunimi | Oppilaitos <br />
    &copy; Taitaja 2023
  </footer>
  <script src="script.js"></script>
</body>

</html>