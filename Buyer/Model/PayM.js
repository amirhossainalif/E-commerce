function validate() {
      const a = document.getElementById("pm");
      const b = document.getElementById("num");
    const c = document.getElementById("proname");
      const d = document.getElementById("proAmount");
     
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
     
      return flag;
    }