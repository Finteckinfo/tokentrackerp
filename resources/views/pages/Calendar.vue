<template>
    <div class="h-[100vh] flex flex-col w-full relative overflow-hidden bg-transparent">
        <div class="w-[10%]">
            <Sidebar class=" fixed top-0 shadow" />
        </div>

    <div class="w-[80%] ml-[18%] bg-transparent">
        <Navbar class="h-16" />
        <div class="flex-1 my-8 mx-auto p-6 bg-white card max-w-[95%] shadow-md min-h-[80vh]">
        <div class="relative bg-white">
            <div class="w-full pt-10 relative z-10 backdrop-blur-3xl">
                <div class="grid grid-cols-2 gap-8 mx-auto ">
                  <div class="col-span-1 xl:col-span-5 px-20">
                    <h2 class="text-3xl leading-tight text-gray-900 mb-1.5 font-bold">See Upcoming Events</h2>
                    <p class="text-lg font-normal text-gray-600 mb-8">Don’t miss your schedule</p>
                    <div class="flex gap-5 flex-col">
                      <div class="p-6 rounded-xl bg-white card">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                            <p class="text-base font-medium text-gray-900">Jan 10,2020 - 10:00 - 11:00</p>
                          </div>
                          <div class="dropdown relative inline-flex">
                            <button type="button" data-target="dropdown-default" class="dropdown-toggle inline-flex justify-center py-2.5 px-1 items-center gap-2 text-sm text-black rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:text-purple-600  ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="4" viewBox="0 0 12 4" fill="none">
                                <path d="M1.85624 2.00085H1.81458M6.0343 2.00085H5.99263M10.2124 2.00085H10.1707" stroke="currentcolor" stroke-width="2.5" stroke-linecap="round"></path>
                              </svg>

                            </button>
                            <div id="dropdown-default" class="dropdown-menu rounded-xl shadow-lg bg-white absolute top-full -left-10 w-max mt-2 hidden" aria-labelledby="dropdown-default">
                              <ul class="py-2">
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                    Edit
                                  </a>
                                </li>
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                   Remove
                                  </a>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-xl leading-8 font-semibold text-black mb-1">Meeting with a friends</h6>
                        <p class="text-base font-normal text-gray-600">Meet-Up for Travel Destination Discussion</p>
                      </div>
                      <div class="p-6 rounded-xl bg-white card">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-sky-400"></span>
                            <p class="text-base font-medium text-gray-900">Jan 10,2020 - 05:40 - 13:00</p>
                          </div>
                          <div class="dropdown relative inline-flex">
                            <button type="button" data-target="dropdown-a" class="dropdown-toggle inline-flex justify-center py-2.5 px-1 items-center gap-2 text-sm text-black rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:text-sky-400  ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="4" viewBox="0 0 12 4" fill="none">
                                <path d="M1.85624 2.00085H1.81458M6.0343 2.00085H5.99263M10.2124 2.00085H10.1707" stroke="currentcolor" stroke-width="2.5" stroke-linecap="round"></path>
                              </svg>

                            </button>
                            <div id="dropdown-a" class="dropdown-menu rounded-xl shadow-lg bg-white absolute -left-10 top-full w-max mt-2 hidden" aria-labelledby="dropdown-a">
                              <ul class="py-2">
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                    Edit
                                  </a>
                                </li>
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                   Remove
                                  </a>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-xl leading-8 font-semibold text-black mb-1">Visiting online courcse</h6>
                        <p class="text-base font-normal text-gray-600">Checks updates for design course</p>
                      </div>
                      <div class="p-6 rounded-xl bg-white card">
                        <div class="flex items-center justify-between mb-3">
                          <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
                            <p class="text-base font-medium text-gray-900">Jan 14, 2020 10:00 - 11:00</p>
                          </div>
                          <div class="dropdown relative inline-flex">
                            <button type="button" data-target="dropdown-b" class="dropdown-toggle inline-flex justify-center py-2.5 px-1 items-center gap-2 text-sm text-black rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:text-emerald-600  ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="4" viewBox="0 0 12 4" fill="none">
                                <path d="M1.85624 2.00085H1.81458M6.0343 2.00085H5.99263M10.2124 2.00085H10.1707" stroke="currentcolor" stroke-width="2.5" stroke-linecap="round"></path>
                              </svg>

                            </button>
                            <div id="dropdown-b" class="dropdown-menu rounded-xl shadow-lg bg-white absolute -left-10 top-full w-max mt-2 hidden" aria-labelledby="dropdown-b">
                              <ul class="py-2">
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                    Edit
                                  </a>
                                </li>
                                <li>
                                  <a class="block px-6 py-2 text-xs hover:bg-gray-100 text-gray-600 font-medium" href="javascript:;">
                                   Remove
                                  </a>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                        <h6 class="text-xl leading-8 font-semibold text-black mb-1">Development meet</h6>
                        <p class="text-base font-normal text-gray-600">Discussion with developer for upcoming project</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-span-1 xl:col-span-7 px-2.5 py-5 sm:p-8 bg-gradient-to-b from-white/25 to-white xl:bg-white rounded-2xl max-xl:row-start-1">
                    <div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-5">
                      <div class="flex items-center gap-4">
                        <h5 class="text-xl leading-8 font-semibold text-gray-900">January 2024</h5>
                        <div class="flex items-center">
                          <button class="text-indigo-600 p-1 rounded transition-all duration-300 hover:text-white hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentcolor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </button>
                          <button class="text-indigo-600 p-1 rounded transition-all duration-300 hover:text-white hover:bg-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path d="M6.00236 3.99707L10.0025 7.99723L6 11.9998" stroke="currentcolor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <div class="flex items-center rounded-md p-1 bg-indigo-50 gap-px">
                        <button class="py-2.5 px-5 rounded-lg bg-indigo-50 text-indigo-600 text-sm font-medium transition-all duration-300 hover:bg-indigo-600 hover:text-white">Day</button>
                        <button class="py-2.5 px-5 rounded-lg bg-indigo-600 text-white text-sm font-medium transition-all duration-300 hover:bg-indigo-600 hover:text-white">Week</button>
                        <button class="py-2.5 px-5 rounded-lg bg-indigo-50 text-indigo-600 text-sm font-medium transition-all duration-300 hover:bg-indigo-600 hover:text-white">Month</button>
                      </div>
                    </div>
                    <div class="border border-indigo-200 rounded-xl">
                      <div class="grid grid-cols-7 rounded-t-3xl border-b border-indigo-200">
                        <div class="py-3.5 border-r rounded-tl-xl border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Sun</div>
                        <div class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Mon</div>
                        <div class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Tue</div>
                        <div class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Wed</div>
                        <div class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Thu</div>
                        <div class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Fri</div>
                        <div class="py-3.5 rounded-tr-xl bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">Sat</div>
                      </div>
                      <div class="grid grid-cols-7 rounded-b-xl">
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50">
                          <span class="text-xs font-semibold text-gray-400">27</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">28</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">29</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">30</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">31</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">1</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">2</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">3</span>
                          <div class="absolute top-9 bottom-1 left-3.5 p-1.5 xl:px-2.5 h-max rounded bg-purple-50 ">
                            <p class="hidden xl:block text-xs font-medium text-purple-600 mb-px">Meeting</p>
                            <span class="hidden xl:block text-xs font-normal text-purple-600 whitespace-nowrap">10:00 - 11:00</span>
                            <p class="xl:hidden w-2 h-2 rounded-full bg-purple-600"></p>
                          </div>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">4</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">5</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">6</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white relative border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">7</span>
                          <div class="absolute top-9 bottom-1 left-3.5 p-1.5 xl:px-2.5 h-max rounded bg-emerald-50 ">
                            <p class="hidden xl:block text-xs font-medium text-emerald-600 mb-px whitespace-nowrap">Developer Meetup</p>
                            <span class="hidden xl:block text-xs font-normal text-emerald-600 whitespace-nowrap">10:00 - 11:00</span>
                            <p class="xl:hidden w-2 h-2 rounded-full bg-emerald-600"></p>
                          </div>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">8</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-indigo-600 sm:text-white sm:w-6 sm:h-6 rounded-full sm:flex items-center justify-center sm:bg-indigo-600">9</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">10</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">11</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">12</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">13</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">14</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">15</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">16</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">17</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">18</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">19</span>
                          <div class="absolute top-9 bottom-1 left-3.5 p-1.5 xl:px-2.5 h-max rounded bg-sky-50 ">
                            <p class="hidden xl:block text-xs font-medium text-sky-600 mb-px whitespace-nowrap">Developer Meetup</p>
                            <span class="hidden xl:block text-xs font-normal text-sky-600 whitespace-nowrap">10:00 - 11:00</span>
                            <p class="xl:hidden w-2 h-2 rounded-full bg-sky-600"></p>
                          </div>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">20</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">21</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">22</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">23</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">24</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">25</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">26</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">27</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">28</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">29</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">30</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-indigo-200 rounded-bl-xl transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-900">31</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">1</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">2</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">3</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">4</span>
                          <div class="absolute top-9 bottom-1 left-3.5 p-1.5 xl:px-2.5 h-max rounded bg-purple-50 ">
                            <p class="hidden xl:block text-xs font-medium text-purple-600 mb-px whitespace-nowrap">Friends Meet</p>
                            <span class="hidden xl:block text-xs font-normal text-purple-600 whitespace-nowrap">09:00 - 13:42</span>
                            <p class="xl:hidden w-2 h-2 rounded-full bg-purple-600"></p>
                          </div>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">5</span>
                        </div>
                        <div class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-indigo-200 rounded-br-xl transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                          <span class="text-xs font-semibold text-gray-400">6</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>

      </div>
      <!-- end content -->
    </div>
    <!-- end wrapper -->

    <Footer />
  </div>
</template>







  <script>
import Navbar from '../components/partials/Navbar.vue'
import Sidebar from '../components/partials/Sidebar.vue'
import Footer from '../components/partials/Footer.vue'
import Modal from "../components/modals/TaskModal.vue";

  export default {
    components: {
      Navbar,
      Sidebar,
      Footer,
      Modal,
    },
    data() {
      return {
        events: [], // Replace with actual events data
        showModal: false,
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        currentMonth: new Date().toLocaleString('default', { month: 'long' }),
        currentYear: new Date().getFullYear(),
        calendarDays: [],
        showMonthList: false,
      };
    },
    methods: {
      openModal() {
        this.showModal = true;
      },
      closeModal() {
        this.showModal = false;
      },
      selectMonth(index) {
        this.currentMonth = this.monthNames[index];
        this.showMonthList = false;
        this.generateCalendar(index, this.currentYear);
      },
      changeYear(direction) {
        this.currentYear += direction;
        this.generateCalendar(this.monthNames.indexOf(this.currentMonth), this.currentYear);
      },
      formatTime(date) {
        return new Date(date).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
      },
      generateCalendar(month, year) {
        const daysInMonth = [31, this.getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        const firstDay = new Date(year, month, 1).getDay();
        const days = [];

        for (let i = 0; i < firstDay; i++) {
          days.push({ value: '', key: i, class: '' });
        }

        for (let day = 1; day <= daysInMonth[month]; day++) {
          days.push({ value: day, key: firstDay + day - 1, class: 'calendar-day-hover' });
        }

        this.calendarDays = days;
      },
      getFebDays(year) {
        return ((year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0)) ? 29 : 28;
      },
    },
    mounted() {
      this.generateCalendar(new Date().getMonth(), this.currentYear);
    },
  };
  </script>

  <style scoped>
  /* Add your component styles here */
  </style>
