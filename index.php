<?php
    # don't allow user to access if not logged in
    include 'server.php';
    session_start();

    $user_name = $_SESSION['username'];

    $check_query = ("SELECT * FROM registered_users WHERE UserName='$user_name'");

    $query_result = mysqli_query($connection, $check_query);

    if ($query_result->num_rows > 0) {
        echo "";
    }
    else {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <div class="container-fluid" style="position: fixed; z-index:2;">
            <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Enhanced GPT</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Chat</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{% url 'image-gen' %}">Generate Images</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{% url 'pdf-reader' %}">PDF Reader</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Help
                        </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">About</a></li>
                        <li><a class="dropdown-item" href="#">Help</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Contact us</a></li>
                      </ul>
                        
                      </li>
                    </ul>
                      <div class="dropdown" style="padding-left: 10px; padding-top: 10px;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          New Chat
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item">New Chat</a></li>
                          <li><a class="dropdown-item" href="{% url 'chat-history' %}">History</a></li>
                        </ul>
                      </div>
                  </div>
                </div>
              </nav>
        </div>
    </header>
    <div style="display: flex; height: 100vh;">
        <div id="sidebar">
            <div class="role-input" style="padding-left: 10px; padding-top: 10px;">
                <label for="role-input">Enter the role</label>
                <input type="text" id="role-input" name="role-input">
                <p>Current Role: <b><span id="role-info">Helpful Assistant</span></b></p>
            </div>
            <div class="slider-container-tokens">
            <label for="slider-tokens">Tokens value:</label>
            <input type="range" id="slider-tokens" name="slider-tokens" min="0" max="4000" value="2000">
            <p>Value: <span id="slider-value">2000/4000</span></p>
            </div>
            <div class="slider-container-temperature">
            <label for="slider-tokens">Temperature :</label>
            <input type="range" id="slider-temp" name="slider-tokens" min="0" max="1" value="0.5" step="0.01">
            <p>Value: <span id="slider-val">0.05/1</span></p>
            </div>
            <div class="slider-container-tokens">
            <label for="slider-frequency">Frequency : </label>
            <input type="range" id="slider-frequency" name="slider-frequency" min="-2" max="2" value="1" step="0.1">
            <p>Value: <span id="slider-freq-val">1/2</span></p>
            </div>
            <div class="slider-container-tokens">
            <label for="slider-no-responses">Responses : </label>
            <input type="range" id="slider-no-responses" name="slider-no-responses" min="1" max="5" value="1" step="1">
            <p>Value: <span id="slider-res-no-val">1/5</span></p>
            </div>

            <div class="dropdown mb-4">
              <label for="select-model-button" class="item align-left">Select Model</label><br>
              <button id='select-model-button' class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                GPT-3.5-turbo
              </button>
              <ul class="dropdown-menu">
                <li class="dropdown-item chatModelSelect">GPT-4o</li>
                <li class="dropdown-item chatModelSelect">GPT-3.5-turbo</li>
                <li class="dropdown-item chatModelSelect">GPT-4-turbo</li>
                <li class="dropdown-item chatModelSelect">GPT-4</li>
              </ul>
            </div>
            <div>
                <h6><input type="checkbox" id="remember-context" checked>
                <label for="remember-context">  Remember Context</label></h6>
                <h6><input type="checkbox" id="stream" checked>
                <label for="stream">Stream</label></h6>
            </div>

        </div>
        <div id="history-bar">
            <button id="hover-button-history-bar">&lt;</button></>
            <ul id="file-select-sidebar">
                <li>one</li>
            </ul>
        </div>
      <div style="width: 100%; padding-top: 80px;">
        <div style="justify-content: center; padding-left:220px; width: 100%; display: flex; text-align: center;">
          <div style="width:70%; align-self:center; margin-bottom:70px;">
            <h1>Enhanced GPT</h1>
              <div id="prompt-responses">
                  <p style="font-family: Arial; text-align:left; background-color: gainsboro; border:2px solid gainsboro; border-radius:8px;">
                      👋 Aslam u Alaikum!<br>
                      🛑 I am Enhanced GPT<br>
                      💻 Write a Question and get an Answer<br>
                      🔈 Give a custom Role to Enhanced GPT to behave accordingly<br>
                      🧾🔁 You can Found old responses in History tab<br>
                  </p>
              </div>
          </div>
          <div id="fixed-at-bottom">
          <input id="file-input-element" type="file">
          <button id="file-input-button"><img id="file-input-image" src="images/file.png" alt="file-input-button"></button>
          <textarea id="prompt-text-area"></textarea>
          <button id="submit-button"><img id="submit-image" src="images/send-blue.png" alt="prompt button"></button>
          </div>
      </div>
      </div>
    </div>
        
    <script src="js/bootstrap.bundle.min.js">
      function openWebsite(websiteURL) {
            window.open("history.html", '_');
        }
    </script>
    <script src="js/script.js'"></script>
    <script src="js/markdown.js"></script>
<!--    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>-->


</body>
</html>