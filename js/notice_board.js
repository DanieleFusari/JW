const month_dropdown = document.querySelector('#month');
const month_value = document.querySelector('#month_value');
const files = document.querySelector('#files');

month_dropdown.addEventListener('change', ()=> {
  month_value.value = month_dropdown.value;
})


// load PDF on change and page load
document.getElementById("files").onload = pdf();
month_dropdown.addEventListener('change', pdf);

function pdf(){
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'controller/notice_board_download.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = ()=> {
    if(xhr.status === 200){
      let pdf = JSON.parse(xhr.responseText);
      files.innerHTML = '';
      for (var variable of pdf) {
        create_pdf(variable.file);
      }

    }
  }
  xhr.send(`which_page=${page_name}&month=${month_dropdown.value}`);
}

function create_pdf(file_name){
  // create the elemenst for the pdf files to display
  let div = document.createElement('div');
  div.className = 'file';

  let iframe = document.createElement('iframe');
  iframe.setAttribute('title', 'meeting');
  iframe.setAttribute('class', 'pdf');
  iframe.setAttribute('src', `uploads/${file_name}.pdf`);
  div.appendChild(iframe);

  // first button view
  let a = document.createElement('a');
  a.setAttribute('href', `/uploads/${file_name}.pdf`);
  let button = document.createElement('button');
  button.setAttribute('type', 'button');
  button.setAttribute('class', 'vdd');
  button.textContent = 'View';
  a.appendChild(button);
  div.appendChild(a);

  // second button download
  let a2 = document.createElement('a');
  a2.setAttribute('href', `uploads/${file_name}.pdf`);
  a2.setAttribute('download', '');
  let button2 = document.createElement('button');
  button2.setAttribute('type', 'button');
  button2.setAttribute('class', 'vdd');
  button2.textContent = 'Download';
  a2.appendChild(button2);
  div.appendChild(a2);

  if(level === 'E'){
    let a3 = document.createElement('a');
    a3.setAttribute('href', `../controller/notice_board_delete.php?file_name=${file_name}`);
    let button3 = document.createElement('button');
    button3.textContent = 'Delete';
    button3.className = 'vdd';
    a3.appendChild(button3);
    div.appendChild(a3);

  }
  files.appendChild(div);
}
