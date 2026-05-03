function showPage(n) {
  document.querySelectorAll(".page").forEach(p => 
    p.classList.remove("active")
  );

  const page = document.getElementById("page" + n);
  page.classList.add("active");

  window.location.hash = "page" + n;
  page.scrollIntoView({ behavior: "smooth", block: "start" });
}

function setError(id, msg) {
  document.getElementById(id).textContent = msg;
}

function clearError(id) {
  document.getElementById(id).textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {

 
  document.getElementById("form1").addEventListener("submit", (e) => {
    e.preventDefault();

    const name = document.getElementById("nameInput").value.trim();

    if (name === "") {
      setError("msg1", "Cannot be empty");
      return;
    }

    const words = name.split(" ").filter(w => w !== "");

    if (words.length < 2) {
      setError("msg1", "Must contain at least two words");
      return;
    }

    clearError("msg1");
    showPage(2);
  });

  //EMAIL
  document.getElementById("form2").addEventListener("submit", (e) => {
    e.preventDefault();

    const email = document.getElementById("emailInput").value.trim();

    if (email === "") {
      setError("msg2", "Cannot be empty");
      return;
    }

    if (!email.includes("@") || !email.includes(".")) {
      setError("msg2", "Invalid email address");
      return;
    }

    clearError("msg2");
    showPage(3);
  });

  //GENDER
  document.getElementById("form3").addEventListener("submit", (e) => {
    e.preventDefault();

    const g = document.querySelector('input[name="gender"]:checked');

    if (!g) {
      setError("msg3", "At least one must be selected");
      return;
    }

    clearError("msg3");
    showPage(4);
  });

  // DOB
  document.getElementById("form4").addEventListener("submit", (e) => {
    e.preventDefault();

    const dd = document.getElementById("dd").value.trim();
    const mm = document.getElementById("mm").value.trim();
    const yyyy = document.getElementById("yyyy").value.trim();

    if (dd === "" || mm === "" || yyyy === "") {
      setError("msg4", "Cannot be empty");
      return;
    }

    const d = Number(dd);
    const m = Number(mm);
    const y = Number(yyyy);

    if (!Number.isInteger(d) || !Number.isInteger(m) || !Number.isInteger(y)) {
      setError("msg4", "Must be valid numbers");
      return;
    }

    if (d < 1 || d > 31 || m < 1 || m > 12 || y < 1900 || y > 2016) {
      setError("msg4", "Out of range (dd:1-31, mm:1-12, yyyy:1900-2016)");
      return;
    }

    clearError("msg4");
    showPage(5);
  });

  //DEGREE
  document.getElementById("form5").addEventListener("submit", (e) => {
    e.preventDefault();

    const checked = document.querySelectorAll('input[name="degree"]:checked');

    if (checked.length === 0) {
      setError("msg5", "At least one must be selected");
      return;
    }

    clearError("msg5");
    showPage(6);
  });

  //BLOOD
  document.getElementById("form6").addEventListener("submit", (e) => {
    e.preventDefault();

    const blood = document.getElementById("blood").value;

    if (blood === "") {
      setError("msg6", "Must be selected");
      return;
    }

    clearError("msg6");
    showPage(7);
  });

  // PHOTO
  document.getElementById("form7").addEventListener("submit", (e) => {
    e.preventDefault();

    const userIdVal = document.getElementById("userId").value.trim();
    const pic = document.getElementById("pic").files;

    if (userIdVal === "") {
      setError("msg7", "UserId cannot be empty");
      return;
    }

    const userId = Number(userIdVal);

    if (!Number.isInteger(userId) || userId <= 0) {
      setError("msg7", "UserId must be a positive number");
      return;
    }

    if (!pic || pic.length === 0) {
      setError("msg7", "Picture cannot be empty");
      return;
    }

    clearError("msg7");
    showPage(8);
  });

});