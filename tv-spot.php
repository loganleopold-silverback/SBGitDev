<!-- YouTube Video Section -->
<a id="tvspot"></a>
<!-- <style>

</style> -->
<div id='section-youtube' style="align-items: center;">

	<h2 class="col span_1_of_1" style="text-align: center; min-width: 100%; margin: 25px 0;"><?php echo getSectionSetting( 'youtube_header' ); ?></h2>

	
	<section class="section group" style="width: 100%">
		<div class="col span_5_of_12">
			<div class="youtube-player" data-id="_BrcJBFJwJw">
                <div data-id="_BrcJBFJwJw"> 
                    <!-- <img src='https://i.ytimg.com/vi/_BrcJBFJwJw/hqdefault.jpg'> -->
                </div>
            </div>
		</div>
		<div class="col span_2_of_12">&nbsp;</div>
		<div class="col span_5_of_12">
			<div class="youtube-player" data-id="e31uOc4Poj0">
                 <div data-id="e31uOc4Poj0"> 
                    <!-- <img src='https://i.ytimg.com/vi/e31uOc4Poj0/hqdefault.jpg'> -->
                </div>
            </div>
		</div>
	</section><br><br>
</div>

<script type="text/javascript">

    console.log('TV SPOT SCRIPT LOADED FOR YOUR INFORMATION')

    /* 
    Based loosely on:     
    Light YouTube Embeds by @labnol
    Web: http://labnol.org/?p=27941
    */

    // This script lazy-loads both the Youtube iFrame API and the Youtube videos while still assuring that info is getting to Google Tag Manager

    // It uses the intersection observer instantiated at the bottom to watch for elements entering the page. When they do, a callback function is invoked. The callback for these video interesection observers that carries out the loading of the iframe + videos starts at loadIframes() below. You can follow the watefall down the page. 

    // This first step in the waterfall is the actual observer callback - entries and observer are spec parameters for any intersection observer.
    function loadIframes(entries, observer) {
        // loop through all observed elements that intersect with the boundary
        for (i=0; i < entries.length; i++) {
            if (entries[i].isIntersecting) {
                var target = entries[i].target
                // send the entering element to the APIFirst function to get its iframe built
                APIFirst(target)
                console.log(target)
                observer.unobserve(target)
            }
        }
        //loop through all observed elements that intersect with the boundary
        // entries.forEach( function (entry) {
        //     if (entry.isIntersecting) {   
                // console.log(entry)         
                // let target = entry.target
                // console.log(target)
                // send the entering element to the APIFirst function to get its iframe built
                // APIFirst(target);
                // observer.unobserve(target)
            // }
        // })   
    }

    function APIFirst(player) {
            // (if we have not already added an iframe API script to the page)
            if (document.querySelectorAll('#iframeAPICall').length === 0) {
                console.log("NO YT API")
                // get the head, build an iframe script, and add it to the page
                let head = document.querySelector('head');
                let iframeAPI = document.createElement('script');
                head.appendChild(iframeAPI)
                iframeAPI.setAttribute('id', 'iframeAPICall');
                iframeAPI.setAttribute('src', 'https://www.youtube.com/iframe_api');
                iframeAPI.setAttribute('data-loaded', 'false');
                // iframeAPI.addEventListener('load', function() {
                    console.log("First Load")
                    // only after the script is finished loading: set its attribute to loaded for use in the "else" below and then create the iframe using the player that fired this "if" 
                    function onYouTubeIframeAPIReady() {
                        document.querySelectorAll('#iframeAPICall')[0].setAttribute('data-loaded', 'true')
                        createIframe(player)    
                    }
                // })
            } 
            else {
                // (else there is an iframe API script on the page already)
                if (document.querySelectorAll('#iframeAPICall')[0].dataset.loaded === "true") {
                    console.log("WE MADE IT TO THE LOADED API CALL")
                    // using the data attribute from above, we can see if the script is done and decide to go ahead and build the iframe, or.. (>>below)
                    createIframe(player)
                } else {
                    // we call an event listener on the API script to only load the player when the script has loaded
                    console.log("WE MADE IT TO SECOND ELSE WITH EVENT LISTENER")
                    // document.querySelectorAll('#iframeAPICall')[0].addEventListener('load', function(){
                        console.log("Second Load")
                        function onYouTubeIframeAPIReady() {
                            createIframe(player)    
                    }
                    // })
                }
            };
        }



    function createIframe (player) {
        console.log("A createIframe fired")
            // we actually build the iframe player here
            var iframe = document.createElement("iframe");
            var embed = "https://www.youtube.com/embed/ID?rel=0&color=red&vq=hd1080&showinfo=0&enablejsapi=1&autoplay=0&mute=0";
            iframe.setAttribute("src", embed.replace("ID", player.dataset.id));
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("id", player.id);
            iframe.setAttribute("allowfullscreen", "1");
            iframe.setAttribute("playsinline", "");
            iframe.style.height = "100%";
            iframe.style.width = "100%";
            // replace the original div we were observing with the iframe we just built
            player.parentNode.replaceChild(iframe, player);
            // We check a global variable we set in Google Tag Manager's script (in the Youtube Listener tag we built) and if the iframe's source isn't already there for whatever reason, with this "if" we insure that a Youtube Video object for this iframe is inserted into GTM's list of vids it is observing 
           if (!(YTLIDs.includes(iframe.src))) {
            // if (!(YTLIDs.includes(iframe.src))) {
                // var presence = "absent"
                // for (i=0; i < window.YTLIDs.length; i++) {
                //     if (window.YTLIDs[i] = iframe.src) {
                //         presence = "present"
                //     }
                // }
                // function onYouTubeIframeAPIReady() {
                //     console.log("YT API READY")
                //     if (presence === "absent") {
                        let gtmYT = new YT.Player( iframe, {
                                events: {
                                    onStateChange: onPlayerStateChange,
                                    onError: onPlayerError
                                }
                        })
                        YTListeners.push(gtmYT)
                        // gtmYTListeners.push(gtmYT)
                    // }
            }
    }


    // target the youtube player divs that are holding the YT IDs
    const youtube_players = document.querySelectorAll('.youtube-player')

    // Push the boundary we are observing for intersection 200px below the bottom of the window so that the videos start this process before the user gets to them
    const options = {
        rootMargin: '200px',
    }
    
    // Instantiate the observer with the loadIframes callback + rootMargin option
    const int_observer = new IntersectionObserver(loadIframes, options)

    // let player_count = youtube_players.length 

    // Set the observer upon all of the targeted players with IE friendly syntax
    for (i=0; i <= youtube_players.length - 1; i++) {
        int_observer.observe(youtube_players[i])
    }

</script>

<style>
    .youtube-player {
        position: relative;
        padding-bottom: 56.23%;
        /* Use 75% for 4:3 videos */
        height: 100%;
        width: 100%;
        overflow: hidden;
        max-width: 100%;
        background: #000;
        margin: 5px;
    }
    
    .youtube-player iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
        background: transparent;
    }
    
    #section-youtube .section {
        height: 300px; 
    }

    #section-youtube .section .span_5_of_12 {
        height: 100%;
    }

    .youtube-player img {
        bottom: 0;
        display: block;
        left: 0;
        margin: auto;
        max-width: 100%;
        width: 100%;
        position: absolute;
        right: 0;
        top: 0;
        border: none;
        height: auto;
        cursor: pointer;
        -webkit-transition: .4s all;
        -moz-transition: .4s all;
        transition: .4s all;
    }
    
    .youtube-player img:hover {
        -webkit-filter: brightness(75%);
    }
    
    .youtube-player .play {
        height: 72px;
        width: 72px;
        left: 50%;
        top: 50%;
        margin-left: -36px;
        margin-top: -36px;
        position: absolute;
        background: url("//i.imgur.com/TxzC70f.png") no-repeat;
        cursor: pointer;
    }

@media (max-width: 480px) {
    #section-youtube .section .col:last-child {
        margin-bottom: 75px;
    }
}
</style>