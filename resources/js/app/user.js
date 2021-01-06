$(document).ready(function () {
	const userContainer = $('#user');
	const userDatatable = $('#user-table', userContainer);
	const userFilter = $('#user-filter-container');

	let t = userDatatable.DataTable({
		processing: true,
		serverSide: true,
		deferRender: true,
		'bSort': false,
		ajax: {
			url: userDatatable.data('route'),
			data: function (d) {
				return $.extend({}, d, formToObject(userFilter.find('form')));
			}
		},
		columns: [
			{data: 'id', name: 'id', className: 'text-center', width: "30px"},
			{data: 'username', name: 'username'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'role', name: 'role'},
			{data: 'status', name: 'status',},
			{data: 'action', name: 'action', searchable: false, orderable: false},
		],

		"createdRow": function (row, data, dataIndex) {
            $('[data-toggle="tooltip"]', row).tooltip();
        }
	});

	userFilter.find('form').submit(function (e) {
		e.preventDefault();
		t.ajax.reload();
	});

});