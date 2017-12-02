var $table = $('table');
$table.floatThead({
    scrollContainer: function($table){
		return $table.closest('.wrapper');
	}
});