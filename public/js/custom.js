let table = document.getElementById('main-table');

let editingTd;

table.onclick = function(event) {

    // 3 возможных цели

    let target = event.target.closest('.edit-cancel,.edit-ok,td');

    if (!table.contains(target) || target.className == 'btn-box') return;

    if (target.className == 'edit-cancel') {
        finishTdEdit(editingTd.elem, false);
    } else if (target.className == 'edit-ok') {
        finishTdEdit(editingTd.elem, true);
    } else if (target.nodeName == 'TD') {
        if (editingTd) return; // уже редактируется

        makeTdEditable(target);
    }

};

function makeTdEditable(td) {
    editingTd = {
        elem: td,
        data: td.innerHTML
    };

    td.classList.add('edit-td'); // td в состоянии редактирования, CSS применятся к textarea внутри ячейки

    let input = document.createElement('input');
    input.style.width = td.clientWidth + 'px';
    input.style.height = td.clientHeight - 22 + 'px';
    input.className = 'edit-area';

    input.value = td.innerHTML;
    td.innerHTML = '';
    td.appendChild(input);
    input.focus();

    td.insertAdjacentHTML("beforeEnd",
        '<div class="edit-controls"><button class="edit-ok">OK</button><button class="edit-cancel">CANCEL</button></div>'
    );
}

function finishTdEdit(td,isOk) {
    if (isOk) {
        $.ajax({
            type: "POST",
            data:{value:td.firstChild.value,table:td.dataset.info,id:td.dataset.id},
            url: "../changeInfo.php",
            error: function () {
                alert('Error')
            },
            success: function (e) {
                console.log('Work Fine');
                console.log(e);

            }
        });
        td.innerHTML = td.firstChild.value;
    } else {
        td.innerHTML = editingTd.data;
    }
    td.classList.remove('edit-td');
    editingTd = null;
}