<?php
/**
 * Build Smart - Sample Projects Creator
 * Creates sample project entries based on company profile
 * Access: http://localhost/build/wp-content/themes/buildsmart/create-projects.php
 */

if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

if (!current_user_can('manage_options')) {
    die('You must be an administrator to run this script.');
}

echo "<h1>Build Smart - Sample Projects Creator</h1>";
echo "<p>Creating sample projects from company profile...</p><br>";

$projects = array(
    array(
        'title' => 'Mpazi Rehousing Project',
        'content' => '<p>Through a project supported by the Swiss Cooperation, we provided technical expertise to the City of Kigali in implementing the Mpazi Rehousing Project.</p>
        
        <p>This major urban development initiative involved comprehensive planning, design, and construction supervision for affordable housing units. The project demonstrates our commitment to community-driven solutions and sustainable urban development.</p>
        
        <h3>Project Scope</h3>
        <ul>
            <li>Master planning and site layout design</li>
            <li>Residential building design and engineering</li>
            <li>Infrastructure development coordination</li>
            <li>Construction supervision and quality control</li>
            <li>Community engagement and stakeholder management</li>
        </ul>
        
        <p>The Mpazi Rehousing Project stands as a testament to effective public-private partnerships in delivering quality affordable housing at scale.</p>',
        'client' => 'City of Kigali / Swiss Cooperation',
        'location' => 'Kigali, Rwanda',
        'year' => '2023',
        'area' => '15,000',
        'category' => 'Residential',
    ),
    array(
        'title' => 'Nyabisind Rehousing Project',
        'content' => '<p>The upcoming Nyabisinda Rehousing Project represents our continued partnership with the City of Kigali in addressing housing needs through innovative and sustainable solutions.</p>
        
        <p>This project builds on our experience from the Mpazi initiative, incorporating lessons learned and best practices in affordable housing development.</p>
        
        <h3>Key Features</h3>
        <ul>
            <li>Modern architectural design meeting international standards</li>
            <li>Sustainable building materials and construction methods</li>
            <li>Community facilities and public spaces</li>
            <li>Infrastructure integration with existing urban fabric</li>
        </ul>',
        'client' => 'City of Kigali',
        'location' => 'Kigali, Rwanda',
        'year' => '2024',
        'area' => '12,500',
        'category' => 'Residential',
    ),
    array(
        'title' => 'Sanctuary Hills Apartment',
        'content' => '<p>We provided comprehensive design and supervision support for the Sanctuary Hills Apartment, a modern residential complex that combines contemporary architecture with functional living spaces.</p>
        
        <p>This project showcases our expertise in multi-story residential design, structural engineering, and construction management.</p>
        
        <h3>Project Highlights</h3>
        <ul>
            <li>Modern architectural design with clean lines</li>
            <li>Efficient space planning and natural lighting</li>
            <li>High-quality finishes and amenities</li>
            <li>Landscaped grounds and parking facilities</li>
            <li>Comprehensive MEP systems design</li>
        </ul>',
        'client' => 'Private Developer',
        'location' => 'Kigali, Rwanda',
        'year' => '2023',
        'area' => '3,500',
        'category' => 'Commercial',
    ),
    array(
        'title' => 'Masaka Views Project',
        'content' => '<p>For the Masaka Views project, we conducted comprehensive design reviews, facilitated work permits, and provided short-term supervision services.</p>
        
        <p>This residential development required meticulous attention to regulatory compliance and coordination with multiple stakeholders.</p>
        
        <h3>Services Provided</h3>
        <ul>
            <li>Architectural and engineering design review</li>
            <li>Regulatory compliance and permit facilitation</li>
            <li>Construction documentation preparation</li>
            <li>Site supervision and quality assurance</li>
            <li>Contractor coordination</li>
        </ul>',
        'client' => 'Private Developer',
        'location' => 'Masaka, Kigali',
        'year' => '2023',
        'area' => '4,200',
        'category' => 'Residential',
    ),
    array(
        'title' => 'Kigali Urban Fabric Water Kiosks',
        'content' => '<p>We managed the construction of three water kiosks in Kigali under the Kigali Urban Fabric initiative, a project financed by AFD and the EU.</p>
        
        <p>This infrastructure project provides essential water access points for communities, demonstrating our capability in public utility construction.</p>
        
        <h3>Project Details</h3>
        <ul>
            <li>Construction of three strategically located water kiosks</li>
            <li>Plumbing and water distribution systems</li>
            <li>Durable structure design for high-traffic areas</li>
            <li>Community accessibility features</li>
            <li>Project coordination with AFD and EU</li>
        </ul>',
        'client' => 'AFD / European Union',
        'location' => 'Kigali, Rwanda',
        'year' => '2022',
        'area' => '150',
        'category' => 'Infrastructure',
    ),
    array(
        'title' => 'Mixed-Use Development',
        'content' => '<p>We offered technical expertise across procurement, design, and construction phases for a sophisticated mixed-use development project.</p>
        
        <p>This project combines residential, commercial, and office spaces in an integrated development that maximizes land use efficiency.</p>
        
        <h3>Scope of Work</h3>
        <ul>
            <li>Integrated design of residential and commercial spaces</li>
            <li>Structural engineering and MEP systems</li>
            <li>Procurement strategy and contractor selection</li>
            <li>Construction management and supervision</li>
            <li>Quality control and project closeout</li>
        </ul>',
        'client' => 'Private Developer',
        'location' => 'Kigali, Rwanda',
        'year' => '2023',
        'area' => '8,500',
        'category' => 'Commercial',
    ),
    array(
        'title' => 'Kayonza Urugo Women Opportunity Center',
        'content' => '<p>We supported the renovation of Kayonza\'s Urugo Women Opportunity Center for Women for Women International, handling procurement, design, and construction support.</p>
        
        <p>This meaningful project enhances facilities that empower women through education and skills development.</p>
        
        <h3>Project Components</h3>
        <ul>
            <li>Building assessment and renovation design</li>
            <li>Interior space planning for training facilities</li>
            <li>Structural repairs and improvements</li>
            <li>Procurement of materials and contractors</li>
            <li>Construction supervision and quality assurance</li>
        </ul>',
        'client' => 'Women for Women International',
        'location' => 'Kayonza, Rwanda',
        'year' => '2022',
        'area' => '1,200',
        'category' => 'Institutional',
    ),
);

echo "<h2>Creating Projects...</h2><br>";

$created_count = 0;
$skipped_count = 0;

foreach ($projects as $project_data) {
    // Check if project already exists
    $existing = get_page_by_title($project_data['title'], OBJECT, 'project');
    
    if ($existing) {
        echo "⏭️ Skipped: <strong>{$project_data['title']}</strong> (already exists)<br>";
        $skipped_count++;
        continue;
    }
    
    // Create project post
    $new_project = array(
        'post_title'    => $project_data['title'],
        'post_content'  => $project_data['content'],
        'post_status'   => 'publish',
        'post_type'     => 'project',
        'post_author'   => 1,
    );
    
    $project_id = wp_insert_post($new_project);
    
    if ($project_id) {
        // Add custom fields
        update_post_meta($project_id, '_project_client', $project_data['client']);
        update_post_meta($project_id, '_project_location', $project_data['location']);
        update_post_meta($project_id, '_project_year', $project_data['year']);
        update_post_meta($project_id, '_project_area', $project_data['area']);
        
        // Add to category if exists
        if (isset($project_data['category'])) {
            $term = term_exists($project_data['category'], 'project_category');
            if (!$term) {
                $term = wp_insert_term($project_data['category'], 'project_category');
            }
            if (!is_wp_error($term)) {
                wp_set_object_terms($project_id, $term['term_id'], 'project_category');
            }
        }
        
        echo "✅ Created: <strong>{$project_data['title']}</strong> (ID: {$project_id})<br>";
        $created_count++;
    } else {
        echo "❌ Failed: <strong>{$project_data['title']}</strong><br>";
    }
}

echo "<br><hr><br>";
echo "<h2>Summary</h2>";
echo "<p>✅ Created: <strong>{$created_count}</strong> projects<br>";
echo "⏭️ Skipped: <strong>{$skipped_count}</strong> projects (already exist)<br>";
echo "📄 Total: <strong>" . count($projects) . "</strong> projects processed</p>";

echo "<br><p><strong>Note:</strong> Projects have been created with placeholder images. You can upload actual project photos through the WordPress admin.</p>";

echo "<br><a href='/build/wp-admin/edit.php?post_type=project' style='display: inline-block; padding: 10px 20px; background: #3CAF50; color: white; text-decoration: none; border-radius: 5px;'>View Projects in Dashboard</a> ";
echo "<a href='/build/projects' style='display: inline-block; padding: 10px 20px; background: #1a1d2e; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;'>View Projects Page</a>";
