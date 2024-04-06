 <x-card class="mb-4 transition-all">
     <div class="flex justify-between mb-2">
         <h2 class="text-lg font-medium">{{ $job->title }}</h2>
         <div>${{ number_format($job->salary) }}</div>
     </div>
     <div class="mb-3 flex justify-between items-center">
         <div class="flex space-x-4 items-center">
             <div>{{ $job->employer->company_name }}</div>
             <div>{{ $job->location }}</div>
         </div>
         <div class="flex space-x-1 text-xs">
             <x-tag>
                 <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
                     {{ Str::ucfirst($job->experience) }}
                 </a>
             </x-tag>
             <x-tag>
                 <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
                     {{ $job->category }}
                 </a>
             </x-tag>
         </div>
     </div>
     <div>
         {{ $slot }}
     </div>
 </x-card>
