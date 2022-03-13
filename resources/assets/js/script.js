$(function () {
    // Libs Initialisation
    initDatatables();
    initSelect2();

    // Custom Initialisation
    initRandomPasswordGenerator();
    initDeleteModal();

    initInternshipAjax();

    initUsersCreateForm();

});

/**
 * Datatables Initialization
 */
function initDatatables() {
    $('.datatable').dataTable({
        "language": {
            "emptyTable": "Pre tabuľku zatiaľ neexistujú žiadne dáta",
            "search": "Hľadať:",
            "lengthMenu": "Zobraziť _MENU_ záznamov",
            "info": "Zobrazené od _START_ do _END_ z _TOTAL_ záznamov",
            "infoEmpty": "Zobrazené od 0 do 0 z 0 záznamov",
            "paginate": {
                "first":      "Prvá",
                "last":       "Posledná",
                "next":       "Nasledujúca",
                "previous":   "Predchádzajúca"
            }
        },
        "order": [],
        "responsive": false,
        //"lengthMenu": [10, 25, 30, 50, 100],
        //"pageLength": 30,
        //"stateSave": true,
    });
}

/**
 * Select2 Initialization
 */
function initSelect2() {
    $('.select2').select2();
}

/**
 * Random Password Generator Initialization
 */
function initRandomPasswordGenerator(){
    // Random password length and pool
    let length = 10;
    let pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    $('button.random-password-generator').on('click', function () {
        let input = $($(this).data('password-selector'));

        let password = '';
        for(let i = 0; i < length; i++) password += pool.charAt(Math.floor(Math.random() * pool.length));

        input.val(password);
    });
}

/**
 * Delete Modal Initialization
 */
function initDeleteModal(){
    let form;

    $('.delete-button').on('click', function(){
        $('.delete-modal-entity').text($(this).data('entity'));

        form = $(this).parent();

        $('#delete-modal').modal();
    });

    $('#delete-modal-button').on("click", () => form.submit());
}

function initInternshipAjax() {
    $('select[name="study_programme_id"]').on('change', function () {
        // CSRF token
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        // Ajax request
        $.ajax({
            url: $(this).data('url'),
            method: 'get',
            data: {
                id: $(this).val()
            },
            success: function(data){
                if(data.subjects) changeSelectOptions('subject_id', data.subjects ?? [], 'Vyberte predmet');
            },
            error: function(data){
                console.log(error);
            }
        });
    }).trigger('change');
}

function changeSelectOptions(id, data, placeholder = false) {
    let select = $('select[name="'+id+'"]');

    select.empty();

    if(placeholder){
        select.append('<option selected>'+placeholder+'</option>');
    }

    for(let i = 0; i <= data.length - 1; i++){
        select.append('<option value="'+data[i].value+'">'+data[i].option+'</option>');
    }

    select.prop('disabled', data.length == 0);
}

function initUsersCreateForm() {
    let role_select = $('#role-select');

    if(role_select.length > 0){
        let company_select = $('#company-select');
        let workplace_select = $('#workplace-select');

        role_select.change(function () {
            let option = role_select.val();

            company_select.hide();
            workplace_select.hide();

            if(option == 'employee' || option == 'owner') company_select.show();
            if(option == 'lecturer' || option == 'workplace_leader') workplace_select.show();
        }).trigger('change');
    }
}
