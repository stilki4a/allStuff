var userField = document.getElementById('username');

userField.onkeyup = function() {
	var text = userField.value;
	
	var currier = new XMLHttpRequest(); // new ActivexObject();
	currier.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			var persons = JSON.parse(this.responseText);
			var onyaDiv = document.getElementById('names');
			
			onyaDiv.innerHTML = "";
			
			for (var index=0; index < persons.length;  index++) {
				var oneMOreDiv = document.createElement('div');
				oneMOreDiv.height = "200px";
				oneMOreDiv.width = "200px";
				oneMOreDiv.display = "inline-block";
				var oneLink = document.createElement('a');
				oneLink.href='http://localhost/AJAX/Practice3/details.php?name='+persons[index].name;
				var img = document.createElement('img');
				
				img.src = persons[index].pic;
					
				var para = document.createElement('p');
				para.className = 'namesClass';
				para.innerHTML = persons[index].name;
				
				oneMOreDiv.appendChild(oneLink);
				oneLink.appendChild(img);
				oneMOreDiv.appendChild(para);
				
				onyaDiv.appendChild(oneMOreDiv);
				onyaDiv.appendChild(document.createElement("br"));
			}
		}
	};
	
	currier.open('GET', 'http://localhost/AJAX/Practice3/.php?startWith='+text, true);
	currier.send(null);
};