<?php

use Latte\Runtime as LR;

/** source: /var/www/html/app/Presenters/../../templates/Error/4xx.latte */
final class Templatecc9f2c94f2 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent', 'scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 d-flex justify-content-center">
';
		$this->renderBlock('scripts', get_defined_vars()) /* line 6 */;
		echo '
        <canvas id="canvas4" width="730" height="560">
            <!-- Insert fallback content here -->
        </canvas>
        </div>
    </div>
</div>';
	}


	/** {block scripts} on line 6 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            <script type ="text/javascript">
            $(document).ready(function(){ var s=[{ x:50,y:151,r:4,s:"1"},{ x:40,y:266,r:4,s:"2"},{ x:40,y:340,r:5,s:"3"},{ x:125,y:471,r:4,s:"4"},{ x:271,y:525,r:4,s:"5"},{ x:406,y:492,r:4,s:"6"},{ x:517,y:500,r:4,s:"7"},{ x:600,y:430,r:4,s:"8"},{ x:667,y:378,r:4,s:"9"},{ x:694,y:280,r:4,s:"10"},{ x:675,y:192,r:4,s:"11"},{ x:619,y:119,r:4,s:"12"},{ x:559,y:106,r:4,s:"13"},{ x:483,y:75,r:4,s:"14"},{ x:372,y:29,r:4,s:"15"},{ x:220,y:38,r:4,s:"16"},{ x:130,y:79,r:4,s:"0"},{ x:93,y:180,r:7,s:"0,1,16"},{ x:229,y:140,r:8,s:"15,16,17"},{ x:149,y:295,r:7,s:"17,1,2,18"},{ x:181,y:415,r:7,s:"19,2,3,4"},{ x:292,y:180,r:7,s:"18,19"},{ x:287,y:325,r:7,s:"21,19,20,4"},{ x:386,y:111,r:7,s:"13,15,18,21,14"},{ x:322,y:229,r:7,s:"23,21,22"},{ x:344,y:407,r:7,s:"4,5,6,22"},{ x:386,y:365,r:7,s:"24,22,25,6"},{ x:455,y:280,r:7,s:"23,24,26"},{ x:536,y:149,r:7,s:"11,12,13,23,27"},{ x:538,y:365,r:7,s:"8,7,6,26,27"},{ x:600,y:195,r:7,s:"10,11,28,27"},{ x:662,y:295,r:7,s:"8,9,10,27,29,30"}];window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(s){ window.setTimeout(s,1e3/60)},JSON.stringify(s);var t=document.getElementById("canvas4"),r=t.getContext("2d"),_=+getComputedStyle(t).getPropertyValue("height").slice(0,-2),e=+getComputedStyle(t).getPropertyValue("width").slice(0,-2);function y(){ var s=1;$(window).width()<e&&(s=$(window).width()/e),$("#canvas4").width(e*s),$("#canvas4").height(_*s)}y(),$(window).resize(function(){ y()});var n=[];function x(){ return{ dx:(Math.random()-.5)*.75,dy:(Math.random()-.5)*.75}}function a(s,t,_,e,y,x){ this.x=s,this.y=t,this.dx=_,this.dy=e,this.s=x,this.radius=y,this.draw=function(s){ for(r.beginPath(),r.arc(this.x,this.y,this.radius,0,2*Math.PI,!1),r.strokeStyle="#789F9C",r.fillStyle="#789F9C",r.fill(),r.closePath(),r.beginPath(),r.font="20px Comic Sans MS",r.fillStyle="red",r.closePath(),i=0;i<n.length;i++){ var t=n[i].s.split(",");for(j=0;j<t.length;j++){ var s=parseInt(t[j]);r.beginPath(),r.lineTo(n[i].x-n[i].dx/2,n[i].y-n[i].dy/2),r.lineTo(n[s].x-n[s].dx/2,n[s].y-n[s].dy/2),r.stroke()}}},this.update=function(r){ (this.x+this.radius>s+15||this.x-this.radius<s-15)&&(this.dx=-this.dx),(this.y+this.radius>t+15||this.y-this.radius<t-15)&&(this.dy=-this.dy),this.x+=this.dx,this.y+=this.dy,this.draw(r)}}for(i=0;i<s.length;i++){ var h=x().dx,d=x().dy;n.push(new a(s[i].x,s[i].y,h,d,s[i].r,s[i].s))}!function s(){ requestAnimFrame(s),r.clearRect(0,0,e,_);for(var t=0;t<n.length;t++)n[t].update(t)}()});
            </script>
';
	}

}
