
<style>
#wedt {
    background: none repeat scroll 0 0 #0000FF;
    height: 40px;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000000;
}
#wedt table {
    margin: auto;
}
#wedt table td {
    color: #FFFFFF;
    font-family: Arial,ubuntu,sans-serif !important;
    width: 120px;
    padding-top: 8px;
}
#wedt table td input {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #000000;
    color: #0000FF;
    padding: 2px 20px;
    cursor:pointer;
}
#wedt div.left, #wedt div.right {
    display: table;
    float: left;
    margin-left: 30px;
    padding-top: 10px;
}
#wedt div.right 
{
	float: right;
    margin-right: 30px;
}
#wedt a {
    color: #FFFFFF;
    font-weight: bold;
}
#wedt a:hover
{
	text-decoration:underline;
	background:inherit !important;
}
#wedt table td input:hover
{
	background:#36BCE3;
	color:#fff;
	font-weight:bold;
}
[classification=article]:before
{
content: "Article";
}

[classification=article]
{
	position:relative;
	border: 5px solid green !important;
	
}
[classification=tags]:before
{
content: "Tags";
}
[classification=tags]
{
	position:relative;
	border: 5px solid blue !important;

}
[classification=title]:before
{
content: "Title";
}
[classification=title]
{
	position:relative;
	border: 5px solid red !important;

}
[classification=author]:before
{
content: "Author";
}
[classification=author]
{
	position:relative;
	border: 5px solid yellow !important;
	
} 
</style>
