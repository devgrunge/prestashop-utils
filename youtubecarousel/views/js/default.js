var youtubeApiKey = "YOUTUBE_API_KEY";
var channelNickname = "CHANNEL_USERNAME";
var videos = [];
var currentIndex = 0;
var videoContainer = document.querySelector(".carousel-container");

function loadYouTubeDataAPI() {
  var tag = document.createElement("script");
  tag.src = "https://apis.google.com/js/api.js";
  var firstScriptTag = document.getElementsByTagName("script")[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  tag.onload = initializeYouTubeDataAPI;
}

function initializeYouTubeDataAPI() {
  gapi.load("client", function() {
    gapi.client
      .init({
        apiKey: youtubeApiKey,
        discoveryDocs: [
          "https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest"
        ]
      })
      .then(function() {
        getChannelId();
      });
  });
}

function getChannelId() {
  gapi.client.youtube.channels
    .list({
      forUsername: channelNickname,
      part: "id"
    })
    .then(function(response) {
      if (response.result.items && response.result.items.length > 0) {
        var channel = response.result.items[0];
        var channelId = channel.id;
        retrieveVideos(channelId);
      } else {
        console.error("No channel found for the provided nickname.");
      }
    });
}

function retrieveVideos(channelId) {
  var videosRequest = gapi.client.youtube.search.list({
    channelId: channelId,
    part: "snippet",
    maxResults: 5
  });

  videosRequest.execute(function(videosResponse) {
    videos = videosResponse.result.items;
    renderVideos();
    attachEventListeners();
  });
}

function renderVideos() {
  var videoHtml = "";

  for (var i = 0; i < videos.length; i++) {
    var video = videos[i];
    var videoId = video.id.videoId;
    var videoTitle = video.snippet.title;
    var videoDescription = video.snippet.description;

    var videoItemHtml = `
      <div class="video-item">
        <iframe style="height:270px;width:85%" src="https://www.youtube.com/embed/${videoId}" allowfullscreen></iframe>
        <h3 style="font-size: 1.3rem;color:#353235;min-height:45px;margin-top:2rem">${videoTitle}</h3>
        <p style="color:#353235;font-size:0.875rem;margin-top:1rem">${videoDescription}</p>
      </div>
    `;

    videoHtml += videoItemHtml;
  }

  videoContainer.innerHTML = videoHtml;
  videoContainer.style.transform = `translateX(0)`;
}

function prevVideo() {
  currentIndex = (currentIndex - 1 + videos.length) % videos.length;
  videoContainer.style.transform = `translateX(${-currentIndex * 100}%)`;
}

function nextVideo() {
  currentIndex = (currentIndex + 1) % videos.length;
  videoContainer.style.transform = `translateX(${-currentIndex * 100}%)`;
}

function attachEventListeners() {
  document.querySelector(".prev-btn").addEventListener("click", prevVideo);
  document.querySelector(".next-btn").addEventListener("click", nextVideo);
}

loadYouTubeDataAPI();