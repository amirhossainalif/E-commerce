function validate() {
      const x = document.getElementById("user");
      const y = document.getElementById("Password");
     
      let flag = true;
     
      if (x.value === "") {
        flag = false;
        document.getElementById('error1').innerHTML = "Please fill up the Email";
      }
      if (y.value === "") {
        flag = false;
        document.getElementById('error2').innerHTML = "Please fill up the Password";
      }
     
      return flag;
    }