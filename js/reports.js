const searchButton = document.querySelector('#searchButton');
const totalRecordes = document.querySelector('#totalRecordes');
const totalCongRecordes = document.querySelector('#totalCongRecordes');


searchButton.addEventListener('click', ()=> {
  let name_options = document.querySelector('.name_options');
  let from_date = document.querySelector('#from_date');
  let to_date = document.querySelector('#to_date');

  name_options = name_options.value;
  from_date = from_date.value;
  to_date = to_date.value;

  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'controller/reports.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = ()=> {
    if(xhr.status === 200){
      let treports = JSON.parse(xhr.responseText);
      gridone(treports[0]);
      gridtwo(treports[1]);
    }
  }
  xhr.send(`dateFrom=${from_date}&dateTo=${to_date}&name=${name_options}`);
});

function gridone(rec){
  let details = '';
  totalRecordes.innerHTML = '';
  if(typeof rec.length === 'number') {
    rec.forEach(rec => {
      let tr = document.createElement('tr');
      details = `<td>${rec.name}</td>`;
      details += `<td>${Math.floor(rec.hours / 60)}</td>`;
      details += `<td>${((((rec.hours / 60) - Math.floor(rec.hours / 60)) / 100 * 60).toFixed(2)) * 100 }</td>`;
      details += `<td>${rec.placements}</td>`;
      details += `<td>${rec.videos}</td>`;
      details += `<td>${rec.return_visits}</td>`;
      details += `<td>${rec.studies}</td>`;
      tr.innerHTML = details;
      totalRecordes.appendChild(tr);
    });
  } else {
    totalRecordes.innerHTML = '';
    let tr = document.createElement('tr');
    details = `<td>${rec.name}</td>`;
    details += `<td>${Math.floor(rec.hours / 60)}</td>`;
    details += `<td>${((((rec.hours / 60) - Math.floor(rec.hours / 60)) / 100 * 60).toFixed(2)) * 100 }</td>`;
    details += `<td>${rec.placements}</td>`;
    details += `<td>${rec.videos}</td>`;
    details += `<td>${rec.return_visits}</td>`;
    details += `<td>${rec.studies}</td>`;
    tr.innerHTML = details;
    totalRecordes.appendChild(tr);
  }
}

function gridtwo(trec){
  totalCongRecordes.innerHTML = '';
  let tr = document.createElement('tr');
  tdetails = `<td>${Math.floor(trec.hours / 60)}</td>`;
  tdetails += `<td>${trec.placements}</td>`;
  tdetails += `<td>${trec.videos}</td>`;
  tdetails += `<td>${trec.return_visits}</td>`;
  tdetails += `<td>${trec.studies}</td>`;
  tr.innerHTML = tdetails;
  totalCongRecordes.appendChild(tr);
}
