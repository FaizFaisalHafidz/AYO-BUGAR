<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\CardMember;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Get user or member profile by ID
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(Request $request)
    {
        try {
            $id = $request->input('id');
            $type = $request->input('type', 'member'); // Default to 'member' if not specified
            
            if (!$id) {
                return ResponseFormatter::error(
                    null,
                    'ID parameter is required',
                    400
                );
            }
            
            if ($type === 'member') {
                return $this->getMemberProfile($id);
            } else if ($type === 'user') {
                return $this->getUserProfile($id);
            } else {
                return ResponseFormatter::error(
                    null,
                    'Invalid profile type. Use "member" or "user"',
                    400
                );
            }
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                null,
                'Failed to retrieve profile: ' . $e->getMessage(),
                500
            );
        }
    }
    
    /**
     * Get member profile by ID
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function getMemberProfile($id)
    {
        // Only select necessary fields for performance
        $member = CardMember::select([
            'id', 
            'card_code as code', 
            'card_member_name as name', 
            'email', 
            'wa_number', 
            'effective_date', 
            'expired_date'
        ])->find($id);
        
        if (!$member) {
            return ResponseFormatter::error(
                null,
                'Member profile not found',
                404
            );
        }
        
        return ResponseFormatter::success(
            $member,
            'Member profile retrieved successfully'
        );
    }
    
    /**
     * Get user profile by ID
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    private function getUserProfile($id)
    {
        // Only select necessary fields for performance
        $user = User::select([
            'id', 
            'code', 
            'name', 
            'email', 
            'wa_number', 
            'join_date as effective_date'
        ])->find($id);
        
        if (!$user) {
            return ResponseFormatter::error(
                null,
                'User profile not found',
                404
            );
        }
        
        // Format response to match the required structure
        $formattedUser = [
            'id' => $user->id,
            'code' => $user->code,
            'name' => $user->name,
            'email' => $user->email,
            'wa_number' => $user->wa_number,
            'effective_date' => $user->effective_date,
            'expired_date' => null // Users might not have expiration dates
        ];
        
        return ResponseFormatter::success(
            $formattedUser,
            'User profile retrieved successfully'
        );
    }
}
