let board = ["", "", "", "", "", "", "", "", ""];
let player = "X";
let gameOver = false;

let boardBox = document.getElementById("board");
let statusText = document.getElementById("status");
let resetBtn = document.getElementById("resetBtn");

let scoreX = 0;
let scoreO = 0;

let xText = document.getElementById("scoreX");
let oText = document.getElementById("scoreO");

let winList = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6]
];

makeBoard();

resetBtn.addEventListener("click", resetGame);

function makeBoard() {
  boardBox.innerHTML = "";

  for (let i = 0; i < 9; i++) {
    let cell = document.createElement("div");
    cell.classList.add("cell");
    cell.setAttribute("id", i);
    cell.addEventListener("click", cellClick);
    boardBox.appendChild(cell);
  }
}

function cellClick() {
  let index = this.id;

  if (board[index] != "" || gameOver == true) {
    return;
  }

  board[index] = player;
  this.innerText = player;

  if (checkWin() == true) {
    statusText.innerText = "Player " + player + " wins!";
    gameOver = true;

    if (player == "X") {
      scoreX++;
    } else {
      scoreO++;
    }

    xText.innerText = "X: " + scoreX;
    oText.innerText = "O: " + scoreO;

    showWinColor();
    return;
  }

  if (checkDraw() == true) {
    statusText.innerText = "It's a draw!";
    gameOver = true;
    return;
  }

  if (player == "X") {
    player = "O";
  } else {
    player = "X";
  }

  statusText.innerText = "Current Player: " + player;
}

function checkWin() {
  for (let i = 0; i < winList.length; i++) {
    let a = winList[i][0];
    let b = winList[i][1];
    let c = winList[i][2];

    if (
      board[a] != "" &&
      board[a] == board[b] &&
      board[b] == board[c]
    ) {
      return true;
    }
  }

  return false;
}

function checkDraw() {
  for (let i = 0; i < board.length; i++) {
    if (board[i] == "") {
      return false;
    }
  }
  return true;
}

function showWinColor() {
  for (let i = 0; i < winList.length; i++) {
    let a = winList[i][0];
    let b = winList[i][1];
    let c = winList[i][2];

    if (
      board[a] != "" &&
      board[a] == board[b] &&
      board[b] == board[c]
    ) {
      document.getElementById(a).classList.add("win");
      document.getElementById(b).classList.add("win");
      document.getElementById(c).classList.add("win");
    }
  }
}

function resetGame() {
  board = ["", "", "", "", "", "", "", "", ""];
  player = "X";
  gameOver = false;

  statusText.innerText = "Current Player: X";

  for (let i = 0; i < 9; i++) {
    document.getElementById(i).innerText = "";
    document.getElementById(i).classList.remove("win");
  }
}