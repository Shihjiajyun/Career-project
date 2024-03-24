const typeSpan = document.querySelector('.type');
const texts = ["一場冒險的開始", "尋找自我的過程"]; // 轮流打印的文本数组
let textIndex = 0; // 当前文本的索引
let charIndex = 0; // 当前字符的索引
const typingDelay = 150; // 打字的延迟，单位是毫秒
const erasingDelay = 100; // 删除的延迟，单位是毫秒
const newTextDelay = 1500; // 两次打印之间的延迟

function type() {
  if (charIndex < texts[textIndex].length) {
    // 逐字显示文本
    typeSpan.textContent += texts[textIndex].charAt(charIndex);
    charIndex++;
    setTimeout(type, typingDelay);
  } else {
    // 文本打印完毕，暂停一段时间后开始删除
    setTimeout(erase, newTextDelay);
  }
}

function erase() {
  if (charIndex > 0) {
    // 逐字删除文本
    typeSpan.textContent = texts[textIndex].substring(0, charIndex - 1);
    charIndex--;
    setTimeout(erase, erasingDelay);
  } else {
    // 文本删除完毕，切换到下一句，继续打印
    textIndex = (textIndex + 1) % texts.length; // 切换到下一句
    setTimeout(type, typingDelay + 1100); // 给点时间过渡，然后开始新一轮打印
  }
}

// 初始化打字效果
document.addEventListener("DOMContentLoaded", function () { // 确保 DOM 完全加载
  if (texts.length) setTimeout(type, newTextDelay + 250);
});
