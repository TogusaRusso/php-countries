/* global fetch, error, M */
"use strict";
const listElement = document.getElementById('country-list');
// запрашивает список стран и добавляет его в список
fetch('index.php?json')
    .then(res => res.json())
    .then(list => list.forEach(val => {
        let li = document.createElement('li');
        li.className = 'collection-item';
        li.setAttribute('key', val.id);
        li.innerHTML = val.name;
        listElement.appendChild(li);
    }));
// если строка с ошибкой не пустая, выводит сообщение
if (error) M.toast({ html: error });
