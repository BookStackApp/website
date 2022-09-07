This directory stores YT thumbnails for display. 

From [this post](https://raw.githubusercontent.com/paulirish/lite-youtube-embed/master/youtube-thumbnail-urls.md):

YT thumbnails (eg https://i.ytimg.com/vi/ogfYd705cRs/sddefault.jpg) have multiple resolutions with the following widths:

- `maxresdefault`: 1280px
- `sddefault`: 640px
- `hqdefault`: 480px (lol, naming is hard)
- `mqdefault`: 320px
- `default`: 120px


A script is in this folder for downloading a thumbnail and converting it to a compressed webp image:

```shell
./thumb.sh 5bZ7zlNEphc
```