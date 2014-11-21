// JavaScript Document moving train
 var l=1000;
  var m=0;
  var n=1000;
  var o=1500;
  var speedB2=0; //building speed
  var flag=0;
  var timer_id;
   function scrollPics() {
	 //alert(a);
	  // if(a == 1){
		 document.getElementById('train').style.right=l+'px';
		 document.getElementById('building1').style.left=m+'px';
		 document.getElementById('building2').style.left=n+'px';
		 document.getElementById('building3').style.left=o+'px';
			 l--;
			 m--;
			 n--;
			 o--;
		if(l==-1000) 
		   l=1300;
		if(m==-500)
		   m=0;
		if(n==500)
		   n=1000;
		if(o==1000)
		   o=1500;
		timer_id = setTimeout('scrollPics()',speedB2);
		//scrollPics(a);
	   //}
	}
	function unscrollPics(){
		clearTimeout(timer_id);
	}
	function playOrPause(){
		scrollPics();
		 $.q("#car").click(function(){
			if(flag==0){
			 unscrollPics();
			 flag=1;}
			else{
			 scrollPics();
			 flag=0;
			}
		 });
	}
