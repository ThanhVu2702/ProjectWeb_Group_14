<div class="chatbot">
  <header>
    <h2>Trợ lý ảo Hỗ Trợ Khách Hàng</h2>
    <span class="close-btn material-symbols-outlined"><i class="fas fa-user-alt"></i></span>
  </header>
  <ul class="chatbox">
    <li class="chat incoming">
      <span class="material-symbols-outlined"><i class="fas fa-user-alt"></i></span>
      <p>Xin chào 👋<br>Hỏi tôi bất kì điều gì?</p>
    </li>
  </ul>
  <div class="chat-input">
    <textarea class="form-control" placeholder="Nhập nội dung..." spellcheck="false" required></textarea>
    <span id="send-btn" class="material-symbols-rounded">send</span>
  </div>
</div>
<script>
  const chatbotToggler = document.querySelector(".chatbot-toggler");
  const closeBtn = document.querySelector(".close-btn");
  const chatbox = document.querySelector(".chatbox");
  const chatInput = document.querySelector(".chat-input textarea");
  const sendChatBtn = document.querySelector(".chat-input span");

  let userMessage = null;
  const API_KEY = "sk-proj-2VLXZvng9gG64rZNjSppT3BlbkFJxBdXFdGiB9NM7rN43CTc";
  const inputInitHeight = chatInput.scrollHeight;

  const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined"></span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi;
  }

  const generateResponse = (chatElement) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = chatElement.querySelector("p");
    const prompt1 = "Tự xưng là trợ lý ảo, trả lời ngắn gọn bằng tiếng việt, tập trung trọng tâm";
    const prompt2 = "Nội dung trả lời chủ yếu xoay quanh các phụ kiện điện thoại, tai nghe, ốp lưng, củ sạc điện thoại, nguồn gốc, giá thành, phân loại,...";

    const requestOptions = {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${API_KEY}`
      },
      body: JSON.stringify({
        model: "gpt-3.5-turbo",
        messages: [{
          role: "user",
          content: userMessage + prompt1 + prompt2
        }],
      })
    }

    fetch(API_URL, requestOptions).then(res => res.json()).then(data => {
      messageElement.textContent = data.choices[0].message.content.trim();
    }).catch(() => {
      messageElement.classList.add("error");
      messageElement.textContent = "Có lỗi xảy ra vui lòng thử lại.";
    }).finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
  }

  const handleChat = () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;

    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
      const incomingChatLi = createChatLi("Đang xử lý...", "incoming");
      chatbox.appendChild(incomingChatLi);
      chatbox.scrollTo(0, chatbox.scrollHeight);
      generateResponse(incomingChatLi);
    }, 600);
  }

  chatInput.addEventListener("input", () => {
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
  });

  chatInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
      e.preventDefault();
      handleChat();
    }
  });

  sendChatBtn.addEventListener("click", handleChat);
  closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
  chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
</script>