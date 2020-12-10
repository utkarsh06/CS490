window.onload=function() {
    gameCanvas=document.getElementById("gameCard");
    ctx=gameCanvas.getContext("2d");
    document.addEventListener("keydown",keyPush);
    setInterval(game,1000/15);
}
positionX=positionY=10;
gs=tc=20;
ax=ay=15;
xv=yv=0;
trail=[];
tail = 5;
function game() {
    positionX+=xv;
    positionY+=yv;
    if(positionX<0) {
        positionX= tc-1;
    }
    if(positionX>tc-1) {
        positionX= 0;
    }
    if(positionY<0) {
        positionY= tc-1;
    }
    if(positionY>tc-1) {
        positionY= 0;
    }
    ctx.fillStyle="black";
    ctx.fillRect(0,0,canv.width,canv.height);
 
    ctx.fillStyle="lime";
    for(var i=0;i<trail.length;i++) {
        ctx.fillRect(trail[i].xgs,trail[i].ygs,gs-2,gs-2);
        if(trail[i].x==positionX && trail[i].y==positionY) {
            tail = 5;
        }
    }
    trail.push({x:positionX,y:positionY});
    while(trail.length>tail) {
    trail.shift();
    }
 
    if(ax==positionX && ay==positionY) {
        tail++;
        ax=Math.floor(Math.random()tc);
        ay=Math.floor(Math.random()tc);
    }
    ctx.fillStyle="red";
    ctx.fillRect(axgs,aygs,gs-2,gs-2);
}
function keyPush(evt) {
    switch(evt.keyCode) {
        case 37:
            xv=-1;yv=0;
            break;
        case 38:
            xv=0;yv=-1;
            break;
        case 39:
            xv=1;yv=0;
            break;
        case 40:
            xv=0;yv=1;
            break;
    }
}