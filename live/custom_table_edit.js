$(document).ready(function(){
    $('#data_table').Tabledit({
    deleteButton: false,
    editButton: false,
    columns: {
    identifier: [0, 'id'],
    editable: [[1, 'sn'], [2, 'teamname'], [3, 'finishes'], [4, 'status']]
    },
    hideIdentifier: true,
    url: 'live_edit.php'
    });
    });