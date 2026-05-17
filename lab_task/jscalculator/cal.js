let app = document.getElementById("app");

app.innerHTML = `
  <input type="text" id="display" readonly>
  <br><br>

  <button onclick="press('7')">7</button>
  <button onclick="press('8')">8</button>
  <button onclick="press('9')">9</button>
  <button onclick="press('/')">/</button>
  <br><br>

  <button onclick="press('4')">4</button>
  <button onclick="press('5')">5</button>
  <button onclick="press('6')">6</button>
  <button onclick="press('*')">*</button>
  <br><br>

  <button onclick="press('1')">1</button>
  <button onclick="press('2')">2</button>
  <button onclick="press('3')">3</button>
  <button onclick="press('-')">-</button>
  <br><br>

  <button onclick="press('0')">0</button>
  <button onclick="press('.')">.</button>
  <button onclick="calculate()">=</button>
  <button onclick="press('+')">+</button>
  <br><br>

  <button onclick="clearDisplay()">C</button>
  <button onclick="deleteOne()">DEL</button>
`;

let display = document.getElementById("display");

function press(value) {
  display.value = display.value + value;
}

function calculate() {
  try {
    display.value = eval(display.value);
  } catch {
    display.value = "error";
  }
}

function clearDisplay() {
  display.value = "";
}

function deleteOne() {
  display.value = display.value.slice(0, -1);
}