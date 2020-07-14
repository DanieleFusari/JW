const search = document.querySelector('#buttonEnteSearch');
const recordes = document.querySelector('#recordes');
const totalRecordes = document.querySelector('#totalRecordes');

search.addEventListener('click', (e)=> {
  recordes.innerHTML = '';
  totalRecordes.innerHTML = '';
  let dateFrom = document.querySelector('#dateFrom');
  let dateTo = document.querySelector('#dateTo');
  dateFrom = dateFrom.value;
  dateTo = dateTo.value;

  // results.innerHTML = '';
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'controller/search_for_min_record.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = ()=> {
    if(xhr.status === 200) {
      let logins = JSON.parse(xhr.responseText);
      let details = '';
      logins[0].forEach(rec => {
        let datePart = rec.date.match(/\d+/g);
        let tr = document.createElement('tr');
        details = `<td>${rec.minid}</td>`;
        var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var d = new Date(rec.date);
        details += `<td>${days[d.getDay()]} </td>`;
        details += `<td>${datePart[2]}/${datePart[1]}</td>`;
        details += `<td>${Math.floor(rec.hours / 60)}</td>`;
        details += `<td>${((((rec.hours / 60) - Math.floor(rec.hours / 60)) / 100 * 60).toFixed(2)) * 100 }</td>`;
        details += `<td>${rec.placements}</td>`;
        details += `<td>${rec.videos}</td>`;
        details += `<td>${rec.return_visits}</td>`;
        details += `<td>${rec.studies}</td>`;
        details += `<td>${rec.partner}</td>`;
        tr.innerHTML = details;
        recordes.appendChild(tr);
      });
      logins[1].forEach(trec => {
        let tr = document.createElement('tr');
        tdetails = `<td>${Math.floor(trec.hours / 60)}</td>`;
        tdetails += `<td>${((((trec.hours / 60) - Math.floor(trec.hours / 60)) / 100 * 60).toFixed(2)) * 100 }</td>`;
        tdetails += `<td>${trec.placements}</td>`;
        tdetails += `<td>${trec.videos}</td>`;
        tdetails += `<td>${trec.return_visits}</td>`;
        tdetails += `<td>${trec.studies}</td>`;
        tr.innerHTML = tdetails;
        totalRecordes.appendChild(tr);
      });
    };
  };
  xhr.send(`dateFrom=${dateFrom}&dateTo=${dateTo}`);
})
