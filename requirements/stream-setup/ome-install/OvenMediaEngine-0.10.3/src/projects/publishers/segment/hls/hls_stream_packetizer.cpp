//==============================================================================
//
//  OvenMediaEngine
//
//  Created by Jaejong Bong
//  Copyright (c) 2019 AirenSoft. All rights reserved.
//
//==============================================================================

#include "hls_stream_packetizer.h"
#include "hls_private.h"

//====================================================================================================
// Constructor
//====================================================================================================
HlsStreamPacketizer::HlsStreamPacketizer(const ov::String &app_name,
                                        const ov::String &stream_name,
                                        int segment_count,
                                        int segment_duration,
                                        const ov::String &segment_prefix,
                                        PacketizerStreamType stream_type,
                                        std::shared_ptr<MediaTrack> video_track, std::shared_ptr<MediaTrack> audio_track) :
                                        StreamPacketizer(app_name,
                                                        stream_name,
                                                        segment_count,
                                                        segment_duration,
                                                        stream_type,
                                                        video_track, audio_track)
{
    _packetizer = std::make_shared<HlsPacketizer>(app_name,
                                                stream_name,
                                                stream_type,
                                                segment_prefix,
                                                segment_count,
                                                segment_duration,
                                                video_track, audio_track);
}

//====================================================================================================
// Destructor
//====================================================================================================
HlsStreamPacketizer::~HlsStreamPacketizer()
{
}

//====================================================================================================
// Append Video Frame
//====================================================================================================
bool HlsStreamPacketizer::AppendVideoFrame(std::shared_ptr<PacketizerFrameData> &data)
{
    return _packetizer->AppendVideoFrame(data);
}

//====================================================================================================
// Append Audi Frame
//====================================================================================================
bool HlsStreamPacketizer::AppendAudioFrame(std::shared_ptr<PacketizerFrameData> &data)
{
    return _packetizer->AppendAudioFrame(data);
}

//====================================================================================================
// Get PlayList
// - M3U8
//====================================================================================================
bool HlsStreamPacketizer::GetPlayList(ov::String &play_list)
{
    return _packetizer->GetPlayList(play_list);
}

//====================================================================================================
// GetSegmentData
// - TS
//====================================================================================================
std::shared_ptr<SegmentData> HlsStreamPacketizer::GetSegmentData(const ov::String &file_name)
{
     return _packetizer->GetSegmentData(file_name);
}
