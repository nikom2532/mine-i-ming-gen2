/**************************************************
***** ใช้เมธอด GET ดึงข้อมูลแบบ Text ********************
***************************************************/
function getDataReturnText(url, callback) {
  var objRequest = false;

  if (window.XMLHttpRequest) {
    objRequest = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    objRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (objRequest) {
    objRequest.open("GET", url);
    objRequest.onreadystatechange = handleResponse;
    objRequest.send(null);
  }

  //ฟังก์ชั่น handleResponse เป็น Inner Function
  function handleResponse() {
    if (objRequest.readyState == 4 && objRequest.status == 200) {
      callback(objRequest.responseText);

      delete objRequest;
      objRequest = null;
    }
  } //จบฟังก์ชั่น handleResponse ที่เป็น Inner Function
} //จบฟังก์ชั่น getDataReturnText


/**************************************************
***** ใช้เมธอด GET ดึงข้อมูลแบบ XML *********************
***************************************************/
function getDataReturnXML(url, callback) {
  var objRequest = false;

  if (window.XMLHttpRequest) {
    objRequest = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    objRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (objRequest) {
    objRequest.open("GET", url);
    objRequest.onreadystatechange = handleResponse;
    objRequest.send(null);
  }

  //ฟังก์ชั่น handleResponse เป็น Inner Function
  function handleResponse() {
    if (objRequest.readyState == 4 && objRequest.status == 200) {
      callback(objRequest.responseXML);

      delete objRequest;
      objRequest = null;
    }
  } //จบฟังก์ชั่น handleResponse ที่เป็น Inner Function
} //จบฟังก์ชั่น getDataReturnXML


/**************************************************
***** ใช้เมธอด POST ส่งข้อมูล และรับผลลัพธ์แบบ Text กลับมา ****
***************************************************/
function postDataReturnText(url, data, callback) {
  var objRequest = false;

  if (window.XMLHttpRequest) {
    objRequest = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    objRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (objRequest) {
    objRequest.open("POST", url);
    objRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objRequest.onreadystatechange = handleResponse;
    objRequest.send(data);
  }

  //ฟังก์ชั่น handleResponse เป็น Inner Function
  function handleResponse() {
    if (objRequest.readyState == 4 && objRequest.status == 200) {
      callback(objRequest.responseText);

      delete objRequest;
      objRequest = null;
    }
  } //จบฟังก์ชั่น handleResponse ที่เป็น Inner Function
} //จบฟังก์ชั่น postDataReturnText


/**************************************************
***** ใช้เมธอด POST ส่งข้อมูล และรับผลลัพธ์แบบ XML กลับมา *****
***************************************************/
function postDataReturnXML(url, data, callback) {
  var objRequest = false;

  if (window.XMLHttpRequest) {
    objRequest = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    objRequest = new ActiveXObject("Microsoft.XMLHTTP");
  }

  if (objRequest) {
    objRequest.open("POST", url);
    objRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objRequest.onreadystatechange = handleResponse;
    objRequest.send(data);
  }

  //ฟังก์ชั่น handleResponse เป็น Inner Function
  function handleResponse() {
    if (objRequest.readyState == 4 && objRequest.status == 200) {
      callback(objRequest.responseXML);

      delete objRequest;
      objRequest = null;
    }
  } //จบฟังก์ชั่น handleResponse ที่เป็น Inner Function
} //จบฟังก์ชั่น postDataReturnXML
