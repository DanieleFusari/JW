const search = document.querySelector('#search_name');
const name = document.querySelector('#name');
const results = document.getElementById('results');



search.addEventListener('click', (e)=> {
  results.innerHTML = '';
  let xhr = new XMLHttpRequest();
  xhr.open('GET', `controller/search_for_logins.php?name=${name.value}`);
  xhr.onload = ()=> {
    if(xhr.status === 200) {
      let logins = JSON.parse(xhr.responseText);
      let details = '';
      logins.forEach(id => {
        let tr = document.createElement('tr');
        details = `<td>${id.name}</td>`;
        details += `<td>${id.email}</td>`;
        details += `<td>${id.auth}</td>`;
        details += `<td><a href="sign_up.php?amend=true&email=${id.email}&name=${id.name}&id=${id.id}">Edit</a></td>`;
        tr.innerHTML = details;
        results.appendChild(tr);
      });
    };
  };
  xhr.send();
})
