auth_dash 

Provides a custom block titled 'Dashboard Block' accessible to authenticated users and a route '/auth-dash/output' that is accessible to users
with administer content permission for debugging purposes. 

Manual configuration steps:

1. Go to /admin/structure/block
2. Select 'Place block' in Sidebar first then 'Place block' next to Dashboard Block.
3. Uncheck 'Display Title'.
4. Select the Role tab and check 'Authenticated user'. 
5. Save the block.
6. Navigate to /admin/config/system/auth-dash-config
7. Add in optional welcome message and save.
8. Clear cache

Navigate to any non-administration screen such as the home page to view the block in the sidebar.


