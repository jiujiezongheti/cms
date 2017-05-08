function admin_top_nav(j){
	for(var i = 1;i<5;i++){
		document.getElementById('nav'+i).style.background = '#4c7fb6';
		document.getElementById('nav'+i).style.color = '#fff';
	}
	document.getElementById('nav'+j).style.background = '#eee';
	document.getElementById('nav'+j).style.color = '#3b6ea5';
}
