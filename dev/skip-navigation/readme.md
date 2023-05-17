# Skip Navigation

Existing website

https://webdev.ufv.ca/_dev/skip-navigation/


[https://goufv.github.io/dev/skip-navigation/skip-nav.html](https://goufv.github.io/dev/skip-navigation/skip-nav.html)



## Code

```
<STYLE>
.screenreader-text {
position: absolute;
left: -999px;
width: 1px;
height: 1px;
top: auto;
}
.screenreader-text:focus {
color: black;
display: inline-block;
height: auto;
width: auto;
position: static;
margin: auto;
}

</STYLE>
```

## HTML

```
<a href="#maincontent" class='screenreader-text'>Skip to main content</a>
```

## Within Layout

```
<div id="maincontent">

</div>
```
