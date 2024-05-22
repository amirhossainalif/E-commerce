function validate() {
      const a = document.getElementById("fname");
      const b = document.getElementById("email");
    const c = document.getElementById("phone");
      const d = document.getElementById("Country");
    const e = document.getElementById("State");
      const f = document.getElementById("message");
    const g = document.getElementById("number");
      const h = document.getElementById("Password");
      const i = document.getElementById("CPassword");
     
      let flag = true;
     
      if (a.value === "") {
        flag = false;
        document.getElementById('error1').innerHTML = "Please fill up the Name";
      }
      if (b.value === "") {
        flag = false;
        document.getElementById('error2').innerHTML = "Please fill up the Email";
      }
    if (c.value === "") {
        flag = false;
        document.getElementById('error3').innerHTML = "Please fill up the Phone";
    }
    if (d.value === "") {
        flag = false;
        document.getElementById('error4').innerHTML = "Please fill up the Country";
    }
    if (e.value === "") {
        flag = false;
        document.getElementById('error5').innerHTML = "Please fill up the State";
    }
    if (f.value === "") {
        flag = false;
        document.getElementById('error6').innerHTML = "Please fill up the address";
    }
    if (g.value === "") {
        flag = false;
        document.getElementById('error7').innerHTML = "Please fill up the Postal code";
    }
    if (h.value === "") {
        flag = false;
        document.getElementById('error8').innerHTML = "Please fill up the Password";
    }
    if (i.value === "") {
        flag = false;
        document.getElementById('error9').innerHTML = "Please fill up the Confirm password";
    }
     
      return flag;
    }