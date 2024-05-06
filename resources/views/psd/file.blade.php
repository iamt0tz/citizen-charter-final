<!DOCTYPE HTML  >
  <html>
      <head>
          <title></title>
          <style type="text/css">
              /* #pdf_container { background: #ccc; text-align: center; display: none; padding: 5px;overflow:auto } */
              p{
            font-size: 0.90rem !important;
            padding-top: 1rem !important;
              } 

                  /* Loading animation styles */

            .overlay {
            position: fixed;
            top: 50%;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 254, 254, 0.1); /* Dark background color with some transparency */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Ensure it's above other content */
            }

            #con {
            width: 100px;
            height: 125px;
            margin: auto auto;
            }

            .loading-title {
            display: block;
            text-align: center;
            font-size: 20;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
            padding-top: 80px;
            color: #ffff;
            }

            .loading-circle {
            display: block;
            border-left: 5px solid;
            border-top-left-radius: 100%;
            border-top: 5px solid;
            margin: 5px;
            animation-name: Loader_611;
            animation-duration: 1500ms;
            animation-timing-function: linear;
            animation-delay: 0s;
            animation-iteration-count: infinite;
            animation-direction: normal;
            animation-fill-mode: forwards;
            }

            .sp1 {
            border-left-color: #007bff;
            border-top-color: #007bff;
            width: 40px;
            height: 40px;
            }

            .sp2 {
            border-left-color: #fb4b27;
            border-top-color: #fb4b27;
            width: 30px;
            height: 30px;
            }

            .sp3 {
            width: 20px;
            height: 20px;
            border-left-color: #f2ff00;
            border-top-color: #f2ff00;
            }

            @keyframes Loader_611 {
            0% {
                transform: rotate(0deg);
                transform-origin: right bottom;
            }

            25% {
                transform: rotate(90deg);
                transform-origin: right bottom;
            }

            50% {
                transform: rotate(180deg);
                transform-origin: right bottom;
            }

            75% {
                transform: rotate(270deg);
                transform-origin: right bottom;
            }

            100% {
                transform: rotate(360deg);
                transform-origin: right bottom;
            }
            }

          </style>

      </head>
  <body>        
  <div class="container-fluid">  
      @foreach ($data as $item)   
          @if (isset($item->file) && $item->file >0) 
              <div class="overlay">
                <div id="con">
                  <label class="loading-title">Please wait...</label>
                  <span class="loading-circle sp1">
                    <span class="loading-circle sp2">
                      <span class="loading-circle sp3"></span>
                    </span>
                  </span>
                  
                </div>
              </div> 
              
              {{-- displaying the pdf --}}
              <canvas class="canvas" id="canvas" ></canvas>
        
              <div>
                  <table> 
                    <tr>
                          <td class="margin-left">
                            <button id="firstPage" class="btn btn-block btn-outline-secondary btn-xs"> First page</button>
                          </td>
                          <td  class="margin-left">
                            <button id="previous"  class="btn btn-block bg-gradient-primary btn-xs "><i class="fas fa-angle-double-left"></i> Previous Page</button>
                          </td> 
                          <td class="margin-right"> 
                              <p id="pageNumber" class="fonts"></p>
                          </td>  
                          <td>
                              <button id="next"  class="btn btn-block bg-gradient-primary btn-xs">Next Page <i class="fas fa-angle-double-right"></i></button>
                          </td>
                          <td>
                              <button id="lastPage" class="btn btn-block btn-outline-secondary btn-xs">Last Page  </button>
                          </td>
                    </tr> 
                  </table>
              
          @else 
                    This service does not have a file associated.     
              </div>
          @endif
      @endforeach
  </div>
      
            
  <script>
      
      var url = "/uploads/files/{{$item->file}}";
      
    //pdfjsLib.GlobalWorkerOptions.workerSrc = "//mozilla.github.io/pdf.js/build/pdf.worker.js";
      pdfjsLib.GlobalWorkerOptions.workerSrc = "{{ asset('dist/pdfjs-dist/build/pdf.worker.js') }}";
 
// Asynchronous download of PDF
var loadingTask = pdfjsLib.getDocument(url);



var pdfDoc = null,
    pageNum = 1, 
    totalNumPages = 0, // Add this line
    pageRendering = false,
    pageNumPending = null,
    scale = 0.6,
    canvas = document.getElementById('canvas'),
    ctx = canvas.getContext('2d');

    /**
     * Get page info from document, resize canvas accordingly, and render page. 
     */
    function renderPage(num) {

    // Show loading animation when rendering starts
    showLoadingAnimation();

    pageRendering = true;
    // Using promise to fetch the page
    pdfDoc.getPage(num).then(function(page) {
        var viewport = page.getViewport({scale: scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        // Render PDF page into canvas context
        var renderContext = {
        canvasContext: ctx,
        viewport: viewport
        };
        var renderTask = page.render(renderContext);

        // Wait for rendering to finish
        renderTask.promise.then(function() {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }

                
                // Hide loading animation when rendering is finished
                hideLoadingAnimation();

                
      // Update page counters
      updatePageNumberDisplay();
            });
    });


        // Function to show the loading animation
    function showLoadingAnimation() {
        var loadingOverlay = document.querySelector('.overlay');
        loadingOverlay.style.display = 'block';
    }

        // Function to hide the loading animation
    function hideLoadingAnimation() {
        var loadingOverlay = document.querySelector('.overlay');
        loadingOverlay.style.display = 'none';
        }

        // Update page counters
        document.getElementById('pageNumber').textContent = 'Page ' + num + ' of ' + totalNumPages; // page display
    }
 
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        /**
         * Displays previous page.
         */
        function onPrevPage() {
        if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }
        document.getElementById('previous').addEventListener('click', onPrevPage);

        /**
         * Displays next page.
         */
        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }
        document.getElementById('next').addEventListener('click', onNextPage);

        /**
         * Asynchronously downloads PDF.
         */
        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            totalNumPages = pdfDoc.numPages;  
            document.getElementById('pageNumber').textContent = 'Page ' + pageNum + ' of ' + totalNumPages; // page display
            // alert(totalNumPages); 
            renderPage(pageNum);
        });

          // Add event listener for "Go to First Page" button
          document.getElementById('firstPage').addEventListener('click', onFirstPage);

          // Add event listener for "Go to Last Page" button
          document.getElementById('lastPage').addEventListener('click', onLastPage);

          // Function to go to the first page
          function onFirstPage() {
            if (pageNum === 1) {
              return;
            }
            pageNum = 1;
            queueRenderPage(pageNum);
            updatePageNumberDisplay();
          }

          // Function to go to the last page
          function onLastPage() {
            if (pageNum === totalNumPages) {
              return;
            }
            pageNum = totalNumPages;
            queueRenderPage(pageNum);
            updatePageNumberDisplay();
          }
      </script>
      
      </body>
      </html>
       