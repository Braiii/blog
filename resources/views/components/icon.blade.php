@props(['name'])

@if ($name === 'down-arrow')
    <svg 
        {{ $attributes(['class' => 'transform -rotate-90']) }}
        width="22" 
        height="22" 
        viewBox="0 0 22 22"
    >
        <g fill="none" fill-rule="evenodd">
            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
            </path>
            <path fill="#222"
                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
        </g>
    </svg>
@elseif ($name == 'create')
    <?xml version="1.0" ?>
    <svg 
        class="inline relative -top-0.5"
        height="21" 
        viewBox="0 0 21 21" 
        width="21" 
        xmlns="http://www.w3.org/2000/svg"
    >
        <g 
            fill="none" 
            fill-rule="evenodd" 
            stroke="currentColor" 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            transform="translate(3 3)"
        >
            <path 
                d="m7 1.5h-4.5c-1.1045695 0-2 .8954305-2 2v9.0003682c0 
                1.1045695.8954305 2 2 2h10c1.1045695 0 2-.8954305 2-2v-4.5003682"
            />
            <path 
                d="m14.5.46667982c.5549155.5734054.5474396 1.48588056-.0167966 
                2.05011677l-6.9832034 6.98320341-3 1 1-3 
                6.9874295-7.04563515c.5136195-.51789791.3296676-.55351813 1.8848509-.1045243z"
            />
            <path d="m12.5 2.5.953 1"/>
        </g>
    </svg>
@elseif ($name == 'posts')
    <svg 
        xmlns="http://www.w3.org/2000/svg" 
        fill="none" 
        viewBox="0 0 24 24" 
        stroke-width="1.5" 
        stroke="currentColor" 
        class="w-6 h-6 inline relative -top-0.5"
    >
        <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 
            1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 
            2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 
            3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" 
        />
    </svg>
  
  
@endif