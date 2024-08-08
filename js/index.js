const typeSpan = document.querySelector('.type');
const texts = ["一場冒險的開始", "尋找自我的過程"]; // 輪流打印出的文組
let textIndex = 0; // 當前文本的索引
let charIndex = 0; // 當前打字符號的位置索引
const typingDelay = 150; // 打字的延遲(ms)
const erasingDelay = 100; // 刪除的延遲(ms)
const newTextDelay = 1500; // 兩次打印之間的延遲(ms)

function type() {
  if (charIndex < texts[textIndex].length) {
    // 逐字顯示字組
    typeSpan.textContent += texts[textIndex].charAt(charIndex);
    charIndex++;
    setTimeout(type, typingDelay);
  } else {
    // 文本輸入完畢之後，開始刪掉
    setTimeout(erase, newTextDelay);
  }
}

function erase() {
  if (charIndex > 0) {
    // 逐字刪除文組
    typeSpan.textContent = texts[textIndex].substring(0, charIndex - 1);
    charIndex--;
    setTimeout(erase, erasingDelay);
  } else {
    // 文本刪除完畢，切換到下一句，開始印新的文組
    textIndex = (textIndex + 1) % texts.length; // 切換到下一句
    setTimeout(type, typingDelay + 1100); // 等待一段時間，在開始打下一句
  }
}

// 初始化打字效果
document.addEventListener("DOMContentLoaded", function () { // 確保 DOM 完全加載
  if (texts.length) setTimeout(type, newTextDelay + 250);
});
