
window.onload = function(){
	var nav_li = document.getElementsByTagName('li');
	for(var i=0;i<nav_li.length;i++){
		nav_li[i].onclick = function(){

			this.className = 'selected';
			console.log(this.className);
		}
	}
}
