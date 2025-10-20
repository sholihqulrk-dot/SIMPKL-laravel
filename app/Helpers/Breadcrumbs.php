<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Breadcrumbs
{
    private static $customTitles = [
        // Dashboard
        'dashboard' => 'Dashboard',
        
        // Profile
        'profile' => 'Profile',
        
        // Student routes
        'student' => 'Student',
        'courses' => 'My Courses',
        
        // Teacher routes  
        'teacher' => 'Teacher',
        'classes' => 'My Classes',
        
        // Company routes
        'company' => 'Company',
        'jobs' => 'Job Postings',
        
        // Admin routes
        'admin' => 'Admin',
        'reports' => 'Reports',
    ];

    /**
     * Generate breadcrumbs from current URL
     */
    public static function generate(): array
    {
        $request = request();
        $segments = $request->segments();
        $breadcrumbs = [];
        
        // If we're on main dashboard, return empty array (handled in view)
        if (empty($segments) || (count($segments) === 1 && $segments[0] === 'dashboard')) {
            return $breadcrumbs;
        }

        $url = '';
        
        foreach ($segments as $index => $segment) {
            // Skip numeric segments (IDs) and specific action segments
            if (self::shouldSkipSegment($segment, $index, $segments)) {
                continue;
            }
            
            $url .= '/' . $segment;
            $label = self::formatLabel($segment, $index);
            
            $breadcrumbs[] = [
                'label' => $label,
                'url' => $url,
                'is_active' => $url === '/' . $request->path()
            ];
        }

        return $breadcrumbs;
    }

    /**
     * Check if segment should be skipped
     */
    private static function shouldSkipSegment(string $segment, int $index, array $segments): bool
    {
        // Skip numeric segments (IDs)
        if (is_numeric($segment)) {
            return true;
        }
        
        // Skip action segments that follow resource segments
        $actionSegments = ['edit', 'create', 'show'];
        if (in_array($segment, $actionSegments) && $index > 0) {
            return true;
        }
        
        return false;
    }

    /**
     * Format segment to readable label
     */
    private static function formatLabel(string $segment, int $index): string
    {
        // Check for custom title
        if (isset(self::$customTitles[$segment])) {
            return self::$customTitles[$segment];
        }
        
        // Replace hyphens and underscores with spaces
        $label = str_replace(['-', '_'], ' ', $segment);
        
        // Capitalize words
        $label = Str::title($label);
        
        return $label;
    }

    /**
     * Check if breadcrumbs should be shown - now always returns true
     */
    public static function shouldShow(): bool
    {
        return true; // Always show breadcrumbs
    }

    /**
     * Add custom title for specific segment
     */
    public static function addCustomTitle(string $segment, string $title): void
    {
        self::$customTitles[$segment] = $title;
    }

    /**
     * Get all custom titles
     */
    public static function getCustomTitles(): array
    {
        return self::$customTitles;
    }
}