<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Stunting - Ayo periksakan kesehatan anakmu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="{{ asset('landing/') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('landing/') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('landing/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('landing/') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('landing/') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('landing/') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('landing/') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('landing/') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="{{ asset('landing/') }}/assets/css/main.css" rel="stylesheet">

  <style>
    .chatbot-messages .user-message,
    .chatbot-messages .bot-message {
      max-width: 50%;
    }

    .user-message {
      margin-left: auto;
    }

    .bot-message {
      margin-right: auto;
    }
  </style>
</head>

<body class="index-page">
  @include('layouts.landing.header')

  <main class="main">
    @include('components.alert')
    @yield('content')
  </main>

  @include('sweetalert::alert')

  <footer>
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Stunting</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

  <!-- Chatbot Button -->
  <button  type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#chatbotModal" style="position: fixed; bottom: 20px; left: 20px;z-index: 9999">
    <i class="bi bi-chat-dots-fill"></i> <span class="mx-2">Chat</span>
  </button>

  <!-- Chatbot Modal -->
  <div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="chatbotModalLabel">Chatbot</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="chatbotMessages" class="chatbot-messages mb-3" style="max-height: 300px; overflow-y: auto;">
            <!-- Chat messages will appear here -->
          </div>
          <div class="input-group">
            <input type="text" id="chatbotInput" class="form-control" placeholder="Type a message...">
            <button id="sendChatbotMessage" class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landing/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('landing/') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('landing/') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('landing/') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('landing/') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('landing/') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('landing/') }}/assets/js/main.js"></script>

  <script>
    document.getElementById('sendChatbotMessage').onclick = function() {
      const message = document.getElementById('chatbotInput').value;
      if (message.trim()) {
        const messageContainer = document.createElement('div');
        messageContainer.className = 'alert alert-primary user-message';
        messageContainer.innerText = message;
        document.getElementById('chatbotMessages').appendChild(messageContainer);
        document.getElementById('chatbotInput').value = '';

        // Placeholder response from bot
        const botResponse = document.createElement('div');
        botResponse.className = 'alert alert-secondary bot-message';
        botResponse.innerText = 'This is a bot response.';
        document.getElementById('chatbotMessages').appendChild(botResponse);
      }
    };
  </script>

</body>

</html>
