<x-app-layout>
    

 {{-- main content --}}

 <div class="p-4 sm:ml-64" style="margin-top: 5%;">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-4">
         
         {{-- chart 1 --}}
         <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
             <div class="flex justify-between">
                 <div>
                     <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                     <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
                 </div>
                 <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                     12%
                     <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                     </svg>
                 </div>
             </div>
             <div id="area-chart"></div>
         </div>
     
         {{-- chart 2 --}}
         <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
             <div class="flex justify-between">
                 <div>
                     <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                     <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
                 </div>
                 <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                     12%
                     <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                     </svg>
                 </div>
             </div>
             <div id="area-chart2"></div>
         </div>
     
         {{-- chart 3 --}}
         <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
             <div class="flex justify-between">
                 <div>
                     <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                     <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
                 </div>
                 <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                     12%
                     <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                     </svg>
                 </div>
             </div>
             <div id="area-chart3"></div>
         </div>
     
         {{-- chart 4 --}}
         <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
             <div class="flex justify-between">
                 <div>
                     <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                     <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
                 </div>
                 <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                     12%
                     <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                     </svg>
                 </div>
             </div>
             <div id="area-chart4"></div>
         </div>
     </div>
     
   </div>
</div>

</x-app-layout>
<script>

//  chart 1

   const options = {
     chart: {
       height: "80%",
       maxWidth: "80%",
       type: "area",
       fontFamily: "Inter, sans-serif",
       dropShadow: {
         enabled: false,
       },
       toolbar: {
         show: false,
       },
     },
     tooltip: {
       enabled: true,
       x: {
         show: false,
       },
     },
     fill: {
       type: "gradient",
       gradient: {
         opacityFrom: 0.55,
         opacityTo: 0,
         shade: "#1C64F2",
         gradientToColors: ["#1C64F2"],
       },
     },
     dataLabels: {
       enabled: false,
     },
     stroke: {
       width: 6,
     },
     grid: {
       show: false,
       strokeDashArray: 4,
       padding: {
         left: 2,
         right: 2,
         top: 0
       },
     },
     series: [
       {
         name: "New users",
         data: [6500, 6418, 6456, 6526, 6356, 6456],
         color: "#1A56DB",
       },
     ],
     xaxis: {
       categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February', '07 February'],
       labels: {
         show: false,
       },
       axisBorder: {
         show: false,
       },
       axisTicks: {
         show: false,
       },
     },
     yaxis: {
       show: false,
     },
   }
   
   if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
     const chart = new ApexCharts(document.getElementById("area-chart"), options);
     chart.render();
   }

   // chart 2
 
   if (document.getElementById("area-chart2") && typeof ApexCharts !== 'undefined') {
     const chart = new ApexCharts(document.getElementById("area-chart2"), options);
     chart.render();
   }


   if (document.getElementById("area-chart3") && typeof ApexCharts !== 'undefined') {
     const chart = new ApexCharts(document.getElementById("area-chart3"), options);
     chart.render();
   }

   if (document.getElementById("area-chart4") && typeof ApexCharts !== 'undefined') {
     const chart = new ApexCharts(document.getElementById("area-chart4"), options);
     chart.render();
   }
   


if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#filter-table", {
        tableRender: (_data, table, type) => {
            if (type === "print") {
                return table
            }
            const tHead = table.childNodes[0]
            const filterHeaders = {
                nodeName: "TR",
                attributes: {
                    class: "search-filtering-row"
                },
                childNodes: tHead.childNodes[0].childNodes.map(
                    (_th, index) => ({nodeName: "TH",
                        childNodes: [
                            {
                                nodeName: "INPUT",
                                attributes: {
                                    class: "datatable-input",
                                    type: "search",
                                    "data-columns": "[" + index + "]"
                                }
                            }
                        ]})
                )
            }
            tHead.childNodes.push(filterHeaders)
            return table
        }
    });
}

</script>


 
