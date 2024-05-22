function validate() {
      const a = document.getElementById("fname");
      const b = document.getElementById("email");
    const c = document.getElementById("phone");
      const d = document.getElementById("message");
    const e = document.getElementById("Password");
     
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
        document.getElementById('error4').innerHTML = "Please fill up the Address";
    }
    if (e.value === "") {
        flag = false;
        document.getElementById('error5').innerHTML = "Please fill up the Password";
    }
     
      return flag;
    }